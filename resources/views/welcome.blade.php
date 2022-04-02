<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Order</title>
    <!-- MDB icon -->
    <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <!-- Google Fonts Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    <!-- MDB -->
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css">
  </head>
  <body>
    <div class="container p-5">
      <h2 class="text-center">Client's order</h2>
      <div class="mb-1 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">+ Add Clients</button>
      </div>
      <br>
      @if ($errors->any())
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
      <form method="POST" action="{{ url('store') }}" enctype="multipart/form-data">
        @csrf
        <!-- Name input -->
        <div class="form-group mb-4">
          <select class="form-select" name="client_id" aria-label="Default select example">
            <option selected>Open this to select Client</option>
              @foreach ($clients as $client)
                <option value="{{$client->id}}">{{$client->f_name}} {{$client->l_name}}</option>
              @endforeach
          </select>
        </div>
        <!-- Products input -->
        <div class="form-group mb-4">
          <select class="form-select" name="products_ids[]" multiple id="select">
            @foreach ($products as $product)
              <option value="{{$product->id}}">{{$product->products_name}}</option>
            @endforeach
          </select>
        </div>
        <!-- Submit button -->
        <button type="submit" class="btn btn-primary mb-4">Order</button>
      </form>
    </div>
    @include('clients')
    <!-- MDB -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <!-- Custom scripts -->
    <script type="text/javascript"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".form-select").select2({
                placeholder: " Select product",
                tags: true,
                tokenSeparators: ['/',',',','," "]
            });
        })
    </script>
  </body>
</html>
