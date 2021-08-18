<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{route('home')}}">ShoPBee</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            @if(request()->user() == null)
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('login')}}">Login <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('register.create')}}">Register <span
                            class="sr-only">(current)</span></a>
                </li>
            @endif
            @if(request()->user() != null)
                @cannot('isAdmin')
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('carts.index')}}">Carts</a>
                    </li>
                    @can('isSeller')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Products
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('products.create')}}">Insert New Product</a>
                                <a class="dropdown-item" href="{{route('products.view')}}">View All Products</a>
                                <a class="dropdown-item" href="{{route('products.manage')}}">Manage All Products</a>
                            </div>
                        </li>
                    @endcan
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Transactions
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('transactions.index','buyer')}}">View Buyer
                                Transactions</a>
                            @can('isSeller')
                                <a class="dropdown-item" href="{{route('transactions.index','seller')}}">View Seller
                                    Transactions</a>
                            @endcan
                        </div>
                    </li>
                @endcannot
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Requests
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{route('requests.index')}}">View Requests</a>
                        @can('isMember')
                            <a class="dropdown-item" href="{{route('requests.create')}}">Insert New Request</a>
                        @endcan
                    </div>
                </li>
                @if(request()->user()->role->name == 'Admin')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Vouchers
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('vouchers.index')}}">View All Vouchers</a>
                            <a class="dropdown-item" href="{{route('vouchers.create')}}">Insert New Voucher</a>
                        </div>
                    </li>
                @endif
            @endif
        </ul>
        @if(auth()->user() != null)
            <div>
                Money: {{auth()->user()->money}}
            </div>
            <form action="{{route('logout')}}" class="form-inline my-2 my-lg-0" method="POST">
                @csrf
                <button style="margin-left: 1rem" class="btn btn-outline-success my-2 my-sm-0" type="submit">Logout
                </button>
            </form>
        @endif
    </div>
</nav>
