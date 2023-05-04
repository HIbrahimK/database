<!doctype html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body onload="listele()">

    <H1>ÖĞRENCİ LİSTESİ</H1>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Öğrenci No</th>
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
    <!-- Button trigger modal -->


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">...</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function listele(){

        $.ajax({
            url: "/listele",
            type: "get",
            success: function (response) {
                var listele = document.getElementById('liste');
                listele.innerHTML = "";

                for(var k in response) {
                    console.log(response[k]);
                    let $attb= ''

                    //listele.innerHTML += response[k].isim + " - "+ r  esponse[k].yas + "<br>";
                    listele.innerHTML +=
                        "<tr"+$attb +">"+
                        "<td>"+response[k].StudentID+"</td>"+
                        "<td>" +response[k].StudentName+"</td>" +
                        "<td>"+response[k].StudentSurName+"</td>"+
                        "<td>" +
                        '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button></td>'
                         +
                        "<a class='btn btn-info' href='javascript:void(0)' onclick='edit(`"+response[k].name+"`,`"+response[k].surname+"`,`"+response[k].yas+"`)'>Edit</a></td>" +
                        "</tr>";


                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        });
    }

</script>
</html>
