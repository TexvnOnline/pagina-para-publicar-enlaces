@extends('layouts.client')
@section('content')

@include('client.post._breadcrumb')

<!-- inner page banner END -->
<div class="content-block">
    <!-- About Us -->
    <div class="section-area section-sp1">
        <div class="container">
            <div class="row">

                @include('client.post._side_block')

                <div class="col-lg-9 col-md-8 col-sm-12">

                    <div class="courese-overview" id="overview">
                        <h4>REGLAS DE PUBLICACIÓN</h4>
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <p>los usuarios se comprometen a respetar estas reglas de publicación.</p><br>
                                <p><strong>1.</strong> En caso de enlaces duplicados las publicaciones serán eliminadas.</p>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
<!-- contact area END -->
@endsection
