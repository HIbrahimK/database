<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="listele()">
@auth
    Tebrikler  Giriş yaptınız...
    <form action="/logout" method="post">
        @csrf
        <button>Logout</button>
    </form>

    <div id="create">
        <form method="get" action="{{"create"}}">
            <input type="text" name="isim">
            <input type="text" name="yas">
            <input type="submit" value="Kaydet">
        </form>
    </div>
    <div id="update">
        <form method="get" action="{{"update"}}">
            <input type="hidden" name="eid" id="eid">
            <input type="text" name="isim" id="eisim">
            <input type="text" name="yas" id="eyas">
            <input type="submit" value="Güncelle">
        </form>
    </div>
    <hr>
    @if (session()->has('success'))
        <h1>{{session()->get('success')}}</h1>

    @endif
    <hr>
    <a href="javascript:void(0)" onclick="listele()">Yenile</a>
    <hr>

    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">İsim</th>
                        <th scope="col">Yaş</th>
                        <th scope="col">İşlem</th>
                    </tr>
                    </thead>
                    <tbody id="liste">

                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <div id="liste">
        <!--@if(session()->has('listeleme'))
            @foreach(session()->get('listeleme') as $kul)
                {{$kul->isim}} - {{ $kul->yas }}<br>
    @endforeach
            @endif-->
    </div>
@else
    Lütfen Giriş yapınız...
    <a href="/" class="btn btn-primary btn-lg">Giriş Yapın</a>
@endauth

</body>

<script>
    function listele(){
        document.getElementById( 'update' ).style.display = 'none';
        $.ajax({
            url: "/listele",
            type: "get",
            success: function (response) {
                var listele = document.getElementById('liste');
                listele.innerHTML = "";

                for(var k in response) {
                    console.log(response[k]);
                    let $attb= ''
                    let $deltur="delete?id="
                    if (response[k].deleted_at != null)
                    {
                        $attb= " style='background-color:#FF0000'"

                        $deltur="fdelete?id="
                    }
                    //listele.innerHTML += response[k].isim + " - "+ r  esponse[k].yas + "<br>";
                    listele.innerHTML += "<tr"+ $attb +"><td>" +response[k].isim+"</td><td>"+response[k].yas+"</td>"+
                        "<td><a class='btn btn-info' href='javascript:void(0)' onclick='edit(`"+response[k].id+"`,`"+response[k].isim+"`,`"+response[k].yas+"`)'>Edit</a></td>" +
                        "<td><a class='btn btn-info' href='"+ $deltur +response[k].id+"'>Sil</a></td>" +
                        "</tr>";


                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

    function edit(id, isim, yas){
        document.getElementById( 'create' ).style.display = 'none';
        document.getElementById( 'update' ).style.display = 'block';
        document.getElementById( 'eid' ).value = id;
        document.getElementById( 'eisim' ).value = isim;

        document.getElementById( 'eyas' ).value = yas;


    }

</script>
</html>
