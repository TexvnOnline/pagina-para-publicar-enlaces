@extends('layouts.admin')
@section('content')
<main class="ttr-wrapper">
    <div class="container-fluid">
        <div class="db-breadcrumb">
            <h4 class="breadcrumb-title">Categorías</h4>
            <ul class="db-breadcrumb-list">
                <li><a href="{{route('dashboard')}}"><i class="fa fa-home"></i>Inicio</a></li>
                <li>Categorías</li>
            </ul>
        </div>	
        <div class="row">
            <!-- Your Profile Views Chart -->
            <div class="col-lg-12 m-b30">
                <div class="widget-box">
                    <div class="wc-title">
                        <h4>Categorías</h4>
                    </div>
                    <div class="widget-inner">

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">meta_title</th>
                                    <th scope="col">meta_description</th>
                                    <th scope="col">title</th>
                                    <th scope="col">slug</th>
                                    <th scope="col">description</th>
                                    <th scope="col">actions</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $item)
                                    <tr>
                                        <th scope="row">{{$item->id}}</th>
                                        <td>{{$item->meta_title}}</td>
                                        <td>{{$item->meta_description}}</td>
                                        <td>{{$item->title}}</td>
                                        <td>{{$item->slug}}</td>
                                        <td>{{$item->description}}</td>
                                        <td>

                                            <form method="POST" action="{{route('categories.destroy', $item)}}">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <a href="{{route('categories.edit', $item)}}" class="btn btn-primary">Editar</a>
                                            <button type="submit" class="btn btn-warning">Eliminar</button>

                                            </form>

                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    {{$categories->render()}}
                                </tfoot>
                              </table>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Your Profile Views Chart END-->
        </div>
    </div>
</main>
@endsection