<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet">
    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif

    @if (session()->has('logout_message'))
        <div class="alert alert-danger">
            {{ session()->get('logout_message') }}
        </div>
    @endif
    <div class="row py-4">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center fw-bold">
                    Login
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('login') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                aria-describedby="emailHelp" value="{{ old('email')}}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="{{ old('password')}}">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>