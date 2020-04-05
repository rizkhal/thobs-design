<?php declare(strict_types=1);

namespace App\Facade\File;

use Storage;
use Illuminate\Http\UploadedFile;
use App\Facade\File\Exception\UploadException;

class UploadService
{
	private $file;

	private $type;

	private $filename;

	private $storageDriver;

	private $uploadLocation;

	public function __construct()
	{
		$this->storageDriver = config('filesystem.default');
	}

	public function from(UploadedFile $file): self
	{
		$this->file = $file;
		return $this;
	}

	public function to(string $location): self
	{
		$this->uploadLocation = $location;
		return $this;
	}

	public function type(string ...$type): self
	{
		$this->type = $type;
		return $this;
	}

	public function generateName(string $name): self
	{
		$path = "uploads/".$this->uploadLocation."/".$name.".".$this->getExtension();
		$exists = Storage::disk($this->storageDriver)->exists($path);

		if(! $exists) {
			$this->fileName = $name.".".$this->getExtension();
		} else {
			$i = 2;
			while (Storage::disk($this->storageDriver)->exists(
				"uploads/".$this->uploadLocation."/".$name."_".$i.".".$this->getExtension())
			) $i++;
			$this->fileName = $name."_".$i.".".$this->getExtension();
		}

		return $this;
	}

	public function getExtension(): string
	{
		return $this->file->getClientOriginalExtension();
	}

	private function validate(): void
	{
		if(empty($this->type)) {
			throw new UploadException("Tipe upload tidak boleh kosong");
		}

		$imageMimes = "jpg,jpeg,png";

		$request = [
			"file" => $this->file
		];

		$mimes = ${$this->type[0].'Mimes'};
        if (count($this->type) > 1) {
            unset($this->type[0]);
            foreach($this->type as $type) {
                if (! isset(${$type.'Mimes'})) {
                    throw new UploadException("Konfigurasi mime untuk ".$type.' tidak tersedia');
                }
                $mimes = $mimes.', '.${$type.'Mimes'};
            }
        }

        \Validator::make($request, [
            'file' => 'required|max:50000|mimes:'.$mimes // 'required|max:5000|mimes:'.$mimes
        ], [
            "mimes" => 'Format file harus ('.str_replace(',', ', ', $mimes).')'
        ])->validate();
	}

	public function return(string $type = null): string
    {
        $this->validate();

        if (is_null($this->fileName)) {
            $this->fileName = $this->file->getClientOriginalName();
        }

        $path = Storage::putFileAs(
            'uploads/'.$this->uploadLocation,
            $this->file,
            $this->fileName
        );

        Storage::setVisibility($path, 'public');

        if ($type == 'path') {
            return $path;
        } elseif ($type == 'extension') {
            return $this->getExtension();
        } else {
            return $this->fileName;
        }

    }
}