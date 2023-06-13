<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="{{ asset('css/style.css') }}" rel="stylesheet">


    @if (session()->has('error_message'))
        <div class="alert alert-danger">
            {{ session()->get('error_message') }}
        </div>
    @endif
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card">
                <div class="card-header text-center fw-bold">
                    Register
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ url('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('nama')}}">
                        </div>
                        @if ($errors->has('name'))
                            <small class="text-danger">{{ $errors->first('nama') }}</small>
                        @endif
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ old('email')}}">
                        </div>
                        @if ($errors->has('email'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" value="{{ old('password')}}">
                        </div>
                        @if ($errors->has('password'))
                            <small class="text-danger">{{ $errors->first('password') }}</small>
                        @endif
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="password_confirmation"
                                name="password_confirmation">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
