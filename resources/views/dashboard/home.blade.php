@extends('dashboard.layout.master')
@section('dashboard-head')
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/vendors/css/vendors-rtl.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/vendors/css/charts/apexcharts.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/vendors/css/extensions/tether-theme-arrows.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/vendors/css/extensions/tether.min.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/vendors/css/extensions/shepherd-theme-default.css">
    <!-- END: Vendor CSS-->
    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/colors.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/components.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/themes/semi-dark-layout.css">
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/css-rtl/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css"
          href="{{ asset('dashboard') }}/app-assets/css-rtl/pages/dashboard-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/pages/card-analytics.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/plugins/tour/tour.css">
    <!-- END: Page CSS-->
    <style>
        .card {
            padding-bottom: 20px;
        }
    </style>
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/app-assets/css-rtl/custom-rtl.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/style-rtl.css">
@endsection
@section('dashboard-main')
    <section id="dashboard-analytics">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="card bg-analytics text-white">
                    <div class="card-content">
                        <div class="card-body text-center">
                            <img src="{{ asset('dashboard') }}/app-assets/images/elements/decore-left.png"
                                 class="img-left" alt="
                                    card-img-left">
                            <img src="{{ asset('dashboard') }}/app-assets/images/elements/decore-right.png"
                                 class="img-right" alt="
                                    card-img-right">
                            <div class="avatar avatar-xl bg-primary shadow mt-0">
                                <div class="avatar-content">
                                    <i class="feather icon-award white font-large-1"></i>
                                </div>
                            </div>
                            <div class="text-center">
                                <h1 class="mb-2 text-white">{{ Auth::user()->name }}</h1>
                                <p class="m-auto w-75"><strong>مرحبا , في لوحة التحكم الخاصة بكـ</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-users text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\User::where('isSeller' , 0)->count() }}</h2>
                        <p class="mb-0">طالب الخدمات</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-warning p-50 m-0">
                            <div class="avatar-content">
                                <i class="feather icon-package text-warning font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\User::where('isSeller' , 1)->count() }}</h2>
                        <p class="mb-0">مقدمين الخدمات</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-text-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="fa fa-globe text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\Country::count() }}</h2>
                        <p class="mb-0">الدول</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-rgba-info p-50 m-0">
                            <div class="avatar-content">
                                <i class="fa fa-globe text-info font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\Countries_city::count() }}</h2>
                        <p class="mb-0">المدن</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-text-primary p-50 m-0">
                            <div class="avatar-content">
                                <i class="fa fa-envelope text-primary font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\Contact::count() }}</h2>
                        <p class="mb-0">الرسائل</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card">
                    <div class="card-header d-flex flex-column align-items-start pb-0">
                        <div class="avatar bg-text-success p-50 m-0">
                            <div class="avatar-content">
                                <i class="fa fa-user-secret text-success font-medium-5"></i>
                            </div>
                        </div>
                        <h2 class="text-bold-700 mt-1 mb-25">{{ \App\Models\Moderator::count() }}</h2>
                        <p class="mb-0">المشرفين</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-content">
                        <div id="container2"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <figure class="highcharts-figure">
                            <div id="container3"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">الاعضاء</h4>
                    </div>
                    <div class="card-content">
                        <div class="table-responsive mt-1">
                            <table class="table table-hover-animation mb-0">
                                <thead>
                                <tr>
                                    <th>الاسم</th>
                                    <th>نوع العضوية</th>
                                    <th>تاريخ الانضمام</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $users = \App\Models\User::orderBy('id' , 'desc')->get();
                                ?>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name_ar }} - {{ $user->name_en }}</td>
                                        <td>
                                            @if($user->isSeller == 0)
                                                طالب خدمة
                                            @else
                                                مقدم خدمة
                                            @endif
                                        </td>
                                        <td>{{ $user->created_at }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('dashboard-footer')
    <script src="https://code.highcharts.com/highcharts.js"></script>

    <script type="text/javascript">
        var userData = <?php echo json_encode($userData)?>;
        var sellerData = <?php echo json_encode($sellerData)?>;

        Highcharts.chart('container', {
            title: {
                text: 'New Users & Sellers'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of New Users & Sellers'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'New Users',
                data: userData,

            },{
                name: 'New Sallers',
                data: sellerData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

    </script>
    <script type="text/javascript">
        var serviceData = <?php echo json_encode($serviceData)?>;

        Highcharts.chart('container2', {
            title: {
                text: 'New Servicess'
            },
            xAxis: {
                categories: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September',
                    'October', 'November', 'December'
                ]
            },
            yAxis: {
                title: {
                    text: 'Number of New Services'
                }
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                }
            },
            series: [{
                name: 'services',
                data: serviceData
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }
        });

    </script>
    <script>
        var shown = <?php echo json_encode($shownOrders)?>;
        var unshown = <?php echo json_encode($unshownOrders)?>;
        var orders = <?php echo json_encode($orders)?>;
        // Build the chart
        Highcharts.chart('container3', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Orders Status'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: [{
                    name: 'Unshown Orders',
                    y:(unshown / orders) * 100,
                    sliced: true,
                    selected: true
                }, {
                    name: 'Shown Orders',
                    y:(shown / orders) * 100
                }]
            }]
        });
    </script>

@endsection
