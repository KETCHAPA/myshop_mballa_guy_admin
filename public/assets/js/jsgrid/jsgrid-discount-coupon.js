(function ($) {
    "use strict";
    $("#batchDelete").jsGrid({
        width: "100%",
        autoload: true,
        confirmDeleting: false,
        paging: true,
        controller: {
            loadData: function () {
                return db.clients;
            }
        },
        fields: [
            {
                headerTemplate: function () {
                    return $("<button>").attr("type", "button").text("Supprimer").addClass("btn btn-primary btn-sm btn-delete mb-0 b-r-4")
                        .click(function () {
                            deleteSelectedItems();
                        });
                },
                itemTemplate: function (_, item) {
                    return $("<input>").attr("type", "checkbox")
                        .prop("checked", $.inArray(item, selectedItems) > -1)
                        .on("change", function () {
                            $(this).is(":checked") ? selectItem(item) : unselectItem(item);
                        });
                },
                align: "center",
                width: 100
            },
            { name: "Intitule", type: "text", width: 150 },
            { name: "Code", type: "number", width: 100 },
            { name: "Produit", type: "", width: 100 },
            { name: "Rabais", type: "", width: 100 },
            { name: "Status", type: "", width: 100 },
        ]
    });
    var selectedItems = [];
    var selectItem = function (item) {
        selectedItems.push(item);
    };
    var unselectItem = function (item) {
        selectedItems = $.grep(selectedItems, function (i) {
            return i !== item;
        });
    };
    var deleteSelectedItems = function () {
        if (!selectedItems.length || !confirm("Continuer l'operation ?"))
            return;
        deleteClientsFromDb(selectedItems);
        var $grid = $("#batchDelete");
        $grid.jsGrid("option", "pActionIndex", 1);
        $grid.jsGrid("loadData");
        selectedItems = [];
    };
    var deleteClientsFromDb = function (deletingClients) {
        deletingClients.forEach(client => {
            doAjax(client.Code)
        });
        db.clients = $.map(db.clients, function (client) {
            return ($.inArray(client, deletingClients) > -1) ? null : client;
        });
    };
})(jQuery);

const SERVER_ENDPOINT = 'http://localhost:8000'

function doAjax(code) {
    console.log(code)
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: SERVER_ENDPOINT + '/promotions/' + code,
        method: "DELETE",
        success: function () {
        },
        error: function (err) {
            console.log('Error when deleting promotions')
            console.log(err)
        }
    });

}