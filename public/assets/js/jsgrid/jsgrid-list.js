(function ($) {
    "use strict";
    $("#basicScenario").jsGrid({
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pActionSize: 15,
        pActionButtonCount: 5,
        deleteConfirm: "Supprimer ce champ?",
        controller: db,
        fields: [
            {
                name: "Produit",
                itemTemplate: function (val, item) {
                    return $("<img>").attr("src", "../assets/images/backend/products/" + val).css({ height: 50, width: 50 }).on("click", function () {
                        $("#imagePreview").attr("src", "../assets/images/backend/products/" + item.Image);
                        $("#dialog").dialog("open");
                    });
                },
                insertTemplate: function () {
                    var insertControl = this.insertControl = $("<input>").prop("type", "file");
                    return insertControl;
                },
                insertValue: function () {
                    return this.insertControl[0].files[0];
                },
                align: "center",
                width: 50
            },
            { name: "Nom du produit", type: "text", width: 100 },
            { name: "Prix", type: "number", width: 50 },
            { name: "Quantite", type: "number", width: 50 },
            { name: "Status", type: "", width: 50 },
            { type: "control" }
        ]
    });
})(jQuery);
