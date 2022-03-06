<nav class="ttr-sidebar-navi">
    <ul>
        <li>
            <a href="{{route('dashboard')}}" class="ttr-material-button">
                <span class="ttr-icon"><i class="ti-home"></i></span>
                <span class="ttr-label">Dashborad</span>
            </a>
        </li>
        {{--  <li>
            <a href="index.html" class="ttr-material-button">
                <span class="ttr-icon"><i class="ti-home"></i></span>
                <span class="ttr-label">Dashborad</span>
            </a>
        </li>  --}}
        @can('categories.index')
        <li>
            <a href="#" class="ttr-material-button">
                <span class="ttr-icon"><i class="ti-tag"></i></span>
                <span class="ttr-label">Categorías</span>
                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <ul>
                <li>
                    <a href="{{route('categories.index')}}" class="ttr-material-button"><span class="ttr-label">Listar</span></a>
                </li>
                <li>
                    <a href="{{route('categories.create')}}" class="ttr-material-button"><span class="ttr-label">Nuevo</span></a>
                </li>
            </ul>
        </li>
        @endcan
        

        <li>
            <a href="#" class="ttr-material-button">
                <span class="ttr-icon"><i class="ti-link"></i></span>
                <span class="ttr-label">Enlaces</span>
                <span class="ttr-arrow-icon"><i class="fa fa-angle-down"></i></span>
            </a>
            <ul>
                <li>
                    <a href="{{route('posts.index')}}" class="ttr-material-button"><span class="ttr-label">Listar</span></a>
                </li>
                <li>
                    <a href="{{route('posts.create')}}" class="ttr-material-button"><span class="ttr-label">Nuevo</span></a>
                </li>
            </ul>
        </li>

        {{--  <li>
            <a href="bookmark.html" class="ttr-material-button">
                <span class="ttr-icon"><i class="ti-bookmark-alt"></i></span>
                <span class="ttr-label">Bookmarks</span>
            </a>
        </li>  --}}
        
        <li class="ttr-seperate"></li>
    </ul>
    <!-- sidebar menu end -->
</nav>