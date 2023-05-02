<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <title>Document</title>
</head>
<body>
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-lg-12 col-xl-11">
                <div class="card text-black" style="border-radius: 25px;">
                    <div class="card-body p-md-5">
                        <div class="row justify-content-center">
                            <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>

                                <form action="/kayit" method="post" class="mx-1 mx-md-4">
                                @csrf
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="name" type="text" id="form3Example1c" class="form-control" />
                                            <label class="form-label" for="form3Example1c">İsminiz</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="mail" type="email" id="form3Example3c" class="form-control" />
                                            <label class="form-label" for="form3Example3c">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">


                                            <select name ="state_id" id="iller-dd" class="form-control">

                                                @foreach($iller as $data)
                                                    <option value="{{$data->id}}">{{$data->sehiradi}}</option>
                                                @endforeach
                                            </select>
                                            <label class="form-label" for="form3Example3c">İliniz</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <select name ="town_id" id="state-dd" class="form-control">

                                            </select>
                                            <label class="form-label" for="form3Example3c">İlçeniz</label>
                                        </div>
                                    </div>
                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>

                                        <div class="form-outline flex-fill mb-0">
                                           <!-- <select name ="okullar_id" id="okul-dd" class="form-control">

                                            </select>-->
                                            <input list="okul-dd" id="okullar_id" name="okullar_id" value="" class="form-control" class="col-sm-6 custom-select custom-select-sm">
                                            <datalist id="okul-dd" >

                                            </datalist>
                                            <label class="form-label" for="form3Example3c">Okulunuz</label>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-row align-items-center mb-4">
                                        <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                        <div class="form-outline flex-fill mb-0">
                                            <input name="password" type="password" id="form3Example4c" class="form-control" />
                                            <label class="form-label" for="form3Example4c">Password</label>
                                        </div>
                                    </div>

                                   <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                        <button type="submit" class="btn btn-primary btn-lg">Register</button>
                                    </div>

                                </form>

                            </div>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>
<script type="text/javascript">
    $(document).ready(function() {
        $('#iller-dd').change(function(event) {
            var idCountry = this.value;
            $('#state-dd').html('');

            $.ajax({
                url: "/api/fetch-state",
                type: 'POST',
                dataType: 'json',
                data: {state_id: idCountry,_token:"{{ csrf_token() }}"},

                success:function(response){
                    $('#state-dd').html('<option value="">İlçe Seçiniz</option>');
                    $.each(response.states,function(index, val){
                        $('#state-dd').append('<option value="'+val.id+'"> '+val.ilceadi+' </option>')
                    });
                    // $('#city-dd').html('<option value="">Select City</option>');
                }

            })
        });
        $('#state-dd').change(function(event) {
            var idState = $( "#state-dd option:selected" ).text();
            var idCountry = $( "#iller-dd" ).val();
            console.log(idState);
            console.log(idCountry);
            $('#okul-dd').html('');
            $.ajax({
                url: "/api/fetch-cities",
                type: 'POST',
                dataType: 'json',
                data: {town_id: idState.toLocaleLowerCase('tr'), state_id:idCountry, _token:"{{ csrf_token() }}"},
                success:function(response){
                    //('#okul-dd').html('<option value="">Okul Seçin</option>');
                    console.log(response.schools);
                    $.each(response.schools,function(index, val){
                        $('#okul-dd').append('<option value="'+val.id+'" data-value="'+val.okul_adi+'"> '+val.okul_adi+' </option>')
                    });

                }
            })
        });


    });
</script>
</body>
</html>
