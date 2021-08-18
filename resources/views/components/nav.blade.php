<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">ShoPBee</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(request()->user() == null)
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">Register <span class="sr-only">(current)</span></a>
                </li>
            @endif
            @if(request()->user() != null)
            <li class="nav-item">
                <a class="nav-link" href="{{route('carts.index')}}">Carts</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('products.create')}}">Insert New Product</a>
                    <a class="dropdown-item" href="{{route('products.view')}}">View All Products</a>
                    <a class="dropdown-item" href="{{route('products.manage')}}">Manage All Products</a>
                </div>
            </li>
            @endif
            @if(request()->user() != null)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Transactions
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('transactions.index','buyer')}}">View Buyer Transactions</a>
                            @if(request()->user()->seller != null)
                                <a class="dropdown-item" href="{{route('transactions.index','seller')}}">View Seller Transactions</a>
                            @endif
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('requests.index')}}">My Requests</a>
                    </li>
            @endif
        </ul>
        @if(auth()->user() != null)
            <form action="{{route('logout')}}" class="form-inline my-2 my-lg-0" method="POST">
                @csrf
                <button style="margin-left: 1rem" class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout</button>
            </form>
        @endif
    </div>
</nav>
