(function($) {
    "use strict";
    $("#batchDelete").jsGrid({
        width: "100%",
        autoload: true,
        confirmDeleting: false,
        paging: true,
        controller: {
            loadData: function() {
                return db.clients;
            }
        }, 
        fields: [
            {
                headerTemplate: function() {
                    return $("<button>").attr("type", "button").text("SUPPRIMER") .addClass("btn btn-primary btn-sm btn-delete mb-0 b-r-4")
                        .click( function () {
                            deleteSelectedItems();
                        });
            },
            itemTemplate: function(_, item) {
                return $("<input>").attr("type", "checkbox")
                        .prop("checked", $.inArray(item, selectedItems) > -1)
                        .on("change", function () {
                            $(this).is(":checked") ? selectItem(item) : unselectItem(item);
                        });
            },
            align: "center",
            width: 20
            },
            {
                name: "Photo",
                itemTemplate: function(val, item) {
                    return $("<img>").attr("src", val).css({ height: 50, width: 50 }).on("click", function() {
                        $("#imagePreview").attr("src", item.Img);
                        $("#dialog").dialog("open");
                    });
                },
                insertTemplate: function() {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                insertValue: function() {
                    return this.insertControl[0].files[0];
                },
                align: "center",
                width: 60
            },
            { name: "Nom", type: "", width: 100 },
            { name: "Prenom", type: "", width: 100 },
            { name: "Tel", type:"", width: 100 },
            { name: "Email", type:"", width: 100 },
            { name: "Adresse", type: "", width: 100 },
            { name: "Poste", type: "", width: 100 },
            { name: "Sexe", type: "", width: 100 },
            { name: "Status", type: "", width: 100 },
        ]
    });
    var selectedItems = [];
    var selectItem = function(item) {
        selectedItems.push(item);
    };
    var unselectItem = function(item) {
        selectedItems = $.grep(selectedItems, function(i) {
            return i !== item;
        });
    };
    var deleteSelectedItems = function() {
        if(!selectedItems.length || !confirm("Continuer l'operation ?"))
            return;
        deleteClientsFromDb(selectedItems);
        var $grid = $("#batchDelete");
        $grid.jsGrid("option", "pActionIndex", 1);
        $grid.jsGrid("loadData");
        selectedItems = [];
    };
    var deleteClientsFromDb = function(deletingClients) {
        db.clients = $.map(db.clients, function(client) {
            return ($.inArray(client, deletingClients) > -1) ? null : client;
        });
        deletingClients.forEach(client => {
            doAjax(client.Email)
        });
    };
})(jQuery);

const SERVER_ENDPOINT = 'http://localhost:8000'

function doAjax(email) {
    console.log(email)
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: SERVER_ENDPOINT + '/admins/' + email,
        method: "DELETE",
        success: function (data) {
        },
        error: function (err) {
            console.log('Error discount')
            console.log(err.status)
        }
    });

}