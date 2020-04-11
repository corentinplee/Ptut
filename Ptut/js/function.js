$(document).ready(function() {
	$("#addNew").on('click',function() {
		$("#tableManager").modal('show');
	});
	getExistingData(0,50);

});

        //Suppression
        function deleteRow(rowID) {
        	$.ajax({
        		url:'php/Supp.php',
        		method:'POST',
        		dataType: 'text',
        		data: {
        			key:'deleteRow',
        			rowID:rowID
        		}, success: function(response) {
        			$("#french_"+rowID).parent().remove();
        			alert(response);


        		}
        	});
        }
        //Récupération de données
        function getExistingData(begin,limit) {
        	$.ajax({
        		url:'php/getData.php',
        		method:'POST',
        		dataType: 'text',
        		data: {
        			key: 'getExistingData',
        			begin: begin,
        			limit: limit
        		}, success: function (response){
        			if(response != "reachedMax") {
        				$('tbody').append(response);
							// a voir
							begin += limit;
							getExistingData(begin, limit);
						}
					}
				});
        }
		//ajout
        //a voir
        function addData(key){
        	var name = $("#french_word");
        	var translated_word = $("#translated_word");

            // couleurs onglets empty
            if(name.val() == '') {
            	name.css('border','1px solid red');
            	return;
            } else if (translated_word.val() == ''){
            	translated_word.css('border','1px solid red');
            	return;
            } else if (translated_word.val() == ''){
            	translated_word.css('border','1px solid red');
            	return;
            } else {
            	$.ajax({
            		url:'php/Add.php',
            		method:'POST',
            		dataType: 'text',
            		data: {
            			key: key,
            			name:name.val(),
            			translated_word:translated_word.val(),
            		}, success: function (response){
            			alert(response);
            		}
            	});
            }
        }			