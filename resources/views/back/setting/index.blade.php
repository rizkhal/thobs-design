<x-back-layout title="Setting Pages">
    @section('app')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">Contact Pages</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.setting.contact') }}" class="needs-validation">
                            @csrf
                            @method('PUT')
                            @update({{$setting['contact']->id}})
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Open</label>
                                        <input class="form-control" value="{{old('open', $setting['contact']->open)}}" type="time" name="open">
                                        @error('open')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Close</label>
                                        <input class="form-control" value="{{old('close', $setting['contact']->close)}}" type="time" name="close">
                                        @error('close')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input class="form-control" value="{{ old('phone', $setting['contact']->phone) }}" type="text" name="phone">
                                        @error('phone')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input class="form-control" value="{{ old('address', $setting['contact']->address) }}" type="text" name="address">
                                        @error('address')
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <button name="contact" class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="panel panel-headline">
                    <div class="panel-heading">
                        <h3 class="panel-title">About Pages</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route('admin.setting.about') }}" class="needs-validation" enctype="multipart/form-data">
                            @csrf
                            @method("PUT")
                            @update({{$setting['about']->id}})
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Background</label>
                                        <input class="form-control" value="{{old('background', $setting['about']->background)}}" type="file" name="background">
                                        @error("background")
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" value="{{old('description', $setting['about']->description)}}" name="description" class="form-control">
                                        @error("description")
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div id="links" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Key</label>
                                                <input type="text" name="key[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label>Value</label>
                                                <div class="input-group">
                                                    <input class="form-control" type="text" name="value[]">
                                                    <span class="input-group-btn">
                                                        <button type="button" id="clone" class="btn btn-default">
                                                            <i class="fa fa-plus"></i>
                                                        </button>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        @error("external_url")
                                            <div class="text-danger">
                                                {{$message}}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                    <div class="form-group">
                                        <button name="about" class="btn btn-primary" type="submit">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop

    @push('scripts')
        <script lang="javascript">
            let counter = 0,
                btn = document.getElementById('clone'),
                obj = {};

            const element = (indent, obj = {}) => {
                return `
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" name="key[]" value="${obj.key}" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Value</label>
                                <div class="input-group">
                                    <input class="form-control" value="${obj.value}" type="text" name="value[]">
                                    <span class="input-group-btn">
                                        <button type="button" onclick="javascript:removeElements('link-${indent}'); return false;" class="btn btn-danger">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            };

            window.addEventListener('load', () => {
                let links = {!! json_encode($setting['about']->external_url, JSON_FORCE_OBJECT) !!};
                let data = JSON.parse(links);

                var x = data.external_url;
                
                counter = 0;
                for (var prop in x) {
                    counter++;
                    obj = {
                        key: prop,
                        value: x[prop]
                    };
                    createElements('links', 'div.form-group.', 'link-' + counter, element(counter, obj));

                }
            }, false);

            btn.addEventListener('click', () => {
                counter++;
                obj = {
                    key: "",
                    value: ""
                };
                createElements('links', 'div.form-group.', 'link-' + counter, element(counter, obj));
            }, false);

            const createElements = (parentId, elementTag, elementId, html) => {
                let el = elementTag.split('.');
                var element = document.getElementById(parentId),
                    newElement = document.createElement(el[0]);

                newElement.setAttribute('id', elementId);
                newElement.setAttribute('class', el[1]);

                newElement.innerHTML = html;
                element.appendChild(newElement);
            };

            const removeElements = (elementId) => {
                var element = document.getElementById(elementId);
                element.parentNode.removeChild(element);
            };
        </script>
    @endpush
</x-back-layout>
