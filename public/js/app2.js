 $(document).ready(function(){
        //validacio 
        $('#aprobadavalid').hide();
        $('#aprobadavalid1').hide();
        $('#observalid').hide();
        $('#evaluacion').hide();
        $('#observacioness').prop("required", false);
        $('#valor').prop("required", true);
        $('#desperdicio').prop("required", true);
        $("#aprobada1").on( "click", function() {
            $('#aprobada1').hide();
            $('#aprobadavalid').show();
            $('#aprobada2').show();
            $('#aprobadavalid1').hide();
            $('#observalid').show();
            $('#observacioness').prop("required", true);
            $('#evaluacion').hide();
            $('#inputeval').prop("required", false);
            $('#valorvalid').hide();
            $('#desperdiciovalid').hide();
            $('#valor').prop("required", false);
            $('#desperdicio').prop("required", false);
        });
        $("#aprobada2").on( "click", function() {
            $('#aprobada2').hide();
            $('#aprobadavalid1').show();
            $('#aprobada1').show();
            $('#aprobadavalid').hide();
            $('#evaluacion').show();
            $('#inputeval').prop("required", true);
            $('#observalid').hide();
            $('#observacioness').prop("required", false);
            $('#valorvalid').show();
            $('#desperdiciovalid').show();
            $('#valor').prop("required", true);
            $('#desperdicio').prop("required", true);
        });

        $('#aprobadavalid1').click(function() {
            var radio1 = $("input[type='radio'][name=p1]:checked").val();
            var radio2 = $("input[type='radio'][name=p2]:checked").val();
            var radio3 = $("input[type='radio'][name=p3]:checked").val();
            var radio4 = $("input[type='radio'][name=p4]:checked").val();
            var radio5 = $("input[type='radio'][name=p5]:checked").val();
            var radio6 = $("input[type='radio'][name=p6]:checked").val();
            var radio7 = $("input[type='radio'][name=p7]:checked").val();
            var radio8 = $("input[type='radio'][name=p8]:checked").val();
            var radio9 = $("input[type='radio'][name=p9]:checked").val();
            var radio10 = $("input[type='radio'][name=p10]:checked").val();
            var radio11 = $("input[type='radio'][name=p11]:checked").val();
            var radio12 = $("input[type='radio'][name=p12]:checked").val();
            var radio13 = $("input[type='radio'][name=p13]:checked").val();
            
            if ((radio1 == 1)&&(radio2 == 1)&&(radio3 == 1)&&(radio4 == 1)&&(radio5 == 1)&&(radio6 == 1)&&(radio7 == 1)&&(radio8 == 1)&&(radio9 == 1)&&(radio10 == 1)&&(radio11 == 1)&&(radio12 == 1)&&(radio13 == 1)) {
                return true;
            } 
            else {
                alert("No cumple con todos los puntos, la propuesta debe ser rechazada");
                return false;
            }
        });

        var results = document.getElementById("var").value;
        if (results == "Defectos") { 
                document.getElementById("Defectos").checked = true;
            }
        if (results == "Transportacion") { 
                document.getElementById("Transportacion").checked = true;
            }
        if (results == "Sobreprocesamiento") { 
                document.getElementById("Sobreprocesamiento").checked = true;
            }
        if (results == "Movimiento") { 
                document.getElementById("Movimiento").checked = true;
            }
        if (results == "Espera") { 
                document.getElementById("Espera").checked = true;
            }
        if (results == "Inventario") { 
                document.getElementById("Inventario").checked = true;
            }
        if (results == "Sobreproduccion") { 
                document.getElementById("Sobreproduccion").checked = true;
            }
        if (results == "Talentos") { 
                document.getElementById("Talentos").checked = true;
            }
        if (results == "Metodo de Trabajo") { 
                document.getElementById("Metodo de Trabajo").checked = true;
            }
        if (results == "Productividad") { 
                document.getElementById("Productividad").checked = true;
            }
        if (results == "Disponibilidad de Equipos") { 
                document.getElementById("Disponibilidad de Equipos").checked = true;
            }
        if (results == "Costos") { 
                document.getElementById("Costos").checked = true;
            }
        if (results == "Ahorro de Energia") { 
                document.getElementById("Ahorro de Energia").checked = true;
            }
        if (results == "Ahorro de Suministros") { 
                document.getElementById("Ahorro de Suministros").checked = true;
            }  
        if (results == "Consumo de Refacciones") { 
                document.getElementById("Consumo de Refacciones").checked = true;
            }  
        if (results == "Demoras") { 
                document.getElementById("Demoras").checked = true;
            }  
        if (results == "Demoras y Accidentes") { 
                document.getElementById("Demoras y Accidentes").checked = true;
            }  
        if (results == "Desperdicio de Agua") { 
                document.getElementById("Desperdicio de Agua").checked = true;
            }  
        if (results == "Medio Ambiente") { 
                document.getElementById("Medio Ambiente").checked = true;
            }

            });   

        document.getElementById("notaconf").onblur =function (){    
            this.value = parseFloat(this.value.replace(/,/g, ""))
            .toFixed(2)
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        document.getElementById("notas1").onblur =function (){    
            this.value = parseFloat(this.value.replace(/,/g, ""))
            .toFixed(2)
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        } 

        document.getElementById("notas2").onblur =function (){    
            this.value = parseFloat(this.value.replace(/,/g, ""))
            .toFixed(2)
            .toString()
            .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        } 

            