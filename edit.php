<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>


    <script type="text/javascript" src="js/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <link rel="stylesheet" href="css/customize.css" />


</head>

<body>
    <div class="container">
        <div class="page-header">
            <h2>Inserimento modifica</h2>
        </div>



        <?php

        echo "<h1>" . $_GET["whattaid"] . "</h1>";

        include "connection.php";

        if (!$link) {
            echo "errore di connessione " . mysqli_error($link);
        } else {
            $query = "SELECT * FROM $table WHERE id = " . $_GET["whattaid"];
            $result = mysqli_query($link, $query);
            $datitab = array();
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $datitab[0] = $row['id'];
                    $datitab[1] = $row['data'];
                    $datitab[2] = $row['ora_ingresso'];
                    $datitab[3] = $row['nome_visitatore'];
                    $datitab[4] = $row['tipodocumento'];
                    $datitab[5] = $row['estremi_documento'];
                    $datitab[6] = $row['num_badge'];
                    $datitab[7] = $row['societa_rappresentata'];
                    $datitab[8] = $row['referente_interno'];
                    $datitab[9] = $row['ora_uscita'];
                    $datitab[10] = $row['annotazioni'];
                }




        ?>
                <script type="text/javascript">
                    $(document).ready(function() {
                        $("#sendbut").click(function() {

                            var whattaID = $("#whattaid").val();
                            var dataingresso = $("#datepicker2").val();
                            var oraingresso = $("#oraingresso").val();
                            var nominativo = $("#nominativo").val();
                            var tipodocumento = $("#tipoDocumento").val();
                            var documento = $("#documento").val();
                            var numbadge = $("#numBadge").val();
                            var company = $("#societa").val();
                            var referente = $("#referente").val();
                            var whatexittime = $("#orauscita").val() + ":" + $("#minutiuscita").val();
                            var whatexitData = $("#exitdata").val();
                            var whatnote = $("#note").val();

                            $.ajax({
                                type: "POST",
                                url: "updateRecord.php",
                                data: "whattaid=" + whattaID + "&dataingresso=" + dataingresso + "&oraingresso=" + oraingresso + "&nominativo=" + nominativo +
                                    "&tipodoc=" + tipodocumento + "&doc=" + documento + "&nubadge=" + numbadge + "&company=" + company + "&referente=" +
                                    referente + "&exittime=" + whatexittime + "&exitdata=" + whatexitData + "&nota=" + whatnote,
                                dataType: "JSON",
                                success: function(message) {
                                    // console.log("successo " + message);
                                    alert("successo " + message);
                                    $(location).attr('href','index.html');
                                },
                                error: function(request, staus, error){
                                    alert(request.responseText);
                                }

                            });


                        });
                        // ########### da sistemare ###########

                        $("#adessoUscita").click(function() {

                            var e = new Date();
                            var oraUscita = e.getHours();
                            var minutiuscita = e.getMinutes();
                            $("#orauscita").val(oraUscita);
                            $("#minutiuscita").val(minutiuscita);
                            var exitMonth = e.getMonth() + 1;
                            if (exitMonth < 10) {
                                exitMonth = "0" + exitMonth;
                            }
                            var exitDay = e.getDate();
                            if (exitMonth < 10) {
                                exitMonth = "0" + exitDay;
                            }
                            exitYear = e.getFullYear();

                            if (exitDay != ($("#datepicker2").val()).slice(0, 2)) {
                                var outputexit = exitDay + "/" + exitMonth + "/" + exitYear;
                                $("#exitdata").val(outputexit);

                            } else {
                                $("#exitdata").val("Stesso giorno");
                            }


                        });
                        $("#exitnotsave").click(function() {
                            window.history.back();

                        });
                    });
                </script>
                <div class="table-responsive">
                    <table id="json-data" class="table-responsive table table-bordered table-hover">
                        <tr>
                            <th>ID</th>
                            <th>Data</th>
                            <th>Ora ingresso</th>
                            <th>Nominativo visitatore</th>
                            <th>Tipo di documento</th>
                            <th>Estremi documento</th>
                            <th>Numero Badge interno</th>
                            <th>Società rappresentata</th>
                            <th>Referente interno</th>
                            <th>Ora uscita</th>
                            <th>Data uscita</th>
                            <th>Annotazioni</th>
                            <th>Invio</th>

                        </tr>
                        <tr>
                            <td>
                                <p>

                                    <input type="text" id="whattaid" size="8" value="<?php echo $datitab[0] ?>" disabled="disabled">
                                </p>
                            </td>
                            <td>
                                <p>

                                    <input type="text" id="datepicker2" size="8" value="<?php echo $datitab[1] ?>">
                                </p>
                            </td>

                            <td>
                                <input type="text" name="oraingresso" value="<?php echo $datitab[2] ?>">
                            </td>
                            <td>
                                <input type="text" name="nominativo" id="nominativo" value="<?php echo $datitab[3] ?>" />
                            </td>
                            <td>

                                <input type="text" name="tipoDocumento" id="tipoDocumento" value="<?php echo $datitab[4] ?>" />

                            </td>
                            <td>
                                <input type="text" name="documento" id="documento" value="<?php echo $datitab[5] ?>" />
                            </td>
                            <td>
                                <input type="text" name="numBadge" id="numBadge" value="<?php echo $datitab[6] ?>" size="1" />
                            </td>
                            <td>
                                <input type="text" name="societa" id="societa" value="<?php echo $datitab[7] ?>" />
                            </td>
                            <td>
                                <input type="text" name="referente" id="referente" value="<?php echo $datitab[8] ?>" />
                            </td>
                            <td>
                                <select id="orauscita">
                                    <option value="00">00</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                </select> :
                                <select id="minutiuscita">
                                    <script type="text/javascript">
                                        for (var i = 0; i <= 59; i++) {
                                            if (i < 10) {
                                                i = "0" + i;
                                            }
                                            document.write("<option value='" + i + "'>" + i + "</option>");
                                        }
                                    </script>
                                </select>
                            </td>
                            <td>
                                <input type="text" name="exitdata" id="exitdata" value="" />
                            </td>
                            <td>
                                <input type="text" id="note" name="note" value="<?php echo $datitab[10] ?>" />
                            </td>
                            <td>
                                <input type="button" name="sendbut" id="sendbut" value="send it" />
                            </td>
                        </tr>
                    </table>
                    <input type="button" name="exitnotsave" id="exitnotsave" value="Annulla">
                    <input type="button" value="Adesso uscita" id="adessoUscita" name="adessoUscita" />
                </div>
    </div>
</body>

</html>
<?php
            }
        }

?>