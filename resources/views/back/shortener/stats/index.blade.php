@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
@endpush

<x-back-layout title="Shortener Url Statistics">
    @section('app')
    <div class="container-fluid">
        <a href="javascript:window.history.back();" style="margin-bottom: 1rem!important;" class="btn btn-primary">Back</a>
        <div class="panel panel-headline">
            <div class="panel-heading">
                <h3 class="panel-title">Overview</h3>
                <p class="panel-subtitle">Period: {{convert_date($overview->first)}} - {{convert_date($overview->latest)}}</p>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-key"></i></span>
                            <p>
                                <span class="number">{{numberFormatShort((int)$capacity)}}</span>
                                <span class="title">Key Capacity</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-link"></i></span>
                            <p>
                                <span class="number">{{numberFormatShort($shorts)}}</span>
                                <span class="title">Total Urls</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="metric">
                            <span class="icon"><i class="fa fa-bar-chart"></i></span>
                            <p>
                                <span class="number">{{numberFormatShort($clicks)}}</span>
                                <span class="title">Total Clicks</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        {{-- charts js --}}
                        {!!$charts->render()!!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @stop
</x-back-layout>
