<!DOCTYPE html>
<html>

<head>
    <center>
        <title>Bot Nulis</title>
        <link type="image/png" href="https://b.top4top.io/p_1833lzkex0.png" rel="icon">
        <meta property="og:image" content="https://b.top4top.io/p_1833lzkex0.png">
        <meta content="Bot Untuk Menulis Otomatis." name="description">
        <meta content="Bot Nulis" name="keywords">
        <meta name="theme-color" content="black">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" rel="stylesheet">

        <div class="tile">
            <!-- Hasil Gambar Akan Muncul Di Sini -->
            <div class="tile-body" id="hasil">
            </div>
        </div>
        <div class="tile">
            <div class="tile-body">
                <br>
                <textarea id='teks' class="form-control" placeholder="Masukan Text Yang Ingin Di Tulis !" rows="5"></textarea>
            </div>
        </div>
        <div class="tile">
            <div class="row">
            </div>
            <div class="col">
                <input type='button' onclick="buat()" value="TULIS" id='button' class="btn btn-danger btn-block">
            </div>
        </div>
        </div>

        <script>
            function buat() {
                var xhr = new XMLHttpRequest();
                var isi = encodeURIComponent(document.getElementById("teks").value);
                var url = "https://tools.zone-xsec.com/api/nulis.php?q=" + isi;

                xhr.onloadstart = function() {
                    document.getElementById("button").innerHTML = "Loading...";
                }

                xhr.onerror = function() {
                    alert("Gagal mengambil data");
                };

                xhr.onloadend = function() {
                    if (this.responseText !== "") {
                        //alert(encodeURIComponent(gans));
                        var data = JSON.parse(this.responseText);
                        var img = document.createElement("img");
                        img.setAttribute("width", "304");
                        img.src = data.image;
                        var name = document.createElement("h3");
                        name.innerHTML = data.status;
                        if (data.status == 'Error') {
                            alert('Error');
                            alert('Harap masukan input dengan benar!');
                        } else {
                            document.getElementById("hasil").append(img);

                            setTimeout(function() {
                                document.getElementById("button").innerHTML = "Buat Lagi";
                            }, 3000);
                        }
                    }
                };
                xhr.open("GET", url, true);
                xhr.send();
            }

            function clearResult() {
                document.getElementById("hasil").innerHTML = "";
            }
        </script>
        </div>
        </div>
        </body>

</html>