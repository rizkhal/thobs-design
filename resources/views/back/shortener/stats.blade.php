@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.bundle.min.js">
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<script src="{{ asset('js/chart.js') }}"></script>

<script lang="javascript">

    Stats.line('chart', [
        {
            label: "Clicks",
            fillColor: "rgba(220,220,220,0.2)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            pointHighlightFill: "#fff",
            pointHighlightStroke: "rgba(220,220,220,1)",
            data: [1,2,3]
        }
    ]);
</script>
@endpush

<div class="panel panel-headline">
    <div class="panel-heading">
        <h3 class="panel-title">Overview</h3>
        <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-download"></i></span>
                    <p>
                        <span class="number">10</span>
                        <span class="title">Total Capacity</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-shopping-bag"></i></span>
                    <p>
                        <span class="number">10</span>
                        <span class="title">Total Remaining</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-eye"></i></span>
                    <p>
                        <span class="number">10</span>
                        <span class="title">Total Url</span>
                    </p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="metric">
                    <span class="icon"><i class="fa fa-bar-chart"></i></span>
                    <p>
                        <span class="number">10</span>
                        <span class="title">Total Click</span>
                    </p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-9">
                {{-- <div id="chart" class="ct-chart"></div> --}}
                <canvas id="chart" width="400" height="200"></canvas>
            </div>
            <div class="col-md-3">
                <div class="weekly-summary text-right">
                    <span class="number">2,315</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 12%</span>
                    <span class="info-label">Total Sales</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">$5,758</span> <span class="percentage"><i class="fa fa-caret-up text-success"></i> 23%</span>
                    <span class="info-label">Monthly Income</span>
                </div>
                <div class="weekly-summary text-right">
                    <span class="number">$65,938</span> <span class="percentage"><i class="fa fa-caret-down text-danger"></i> 8%</span>
                    <span class="info-label">Total Income</span>
                </div>
            </div>
        </div>
    </div>
</div>
