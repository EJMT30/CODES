$(document).ready(
    $('select').autocompleteDropdown({ //REQUIRED TONG autocompleteDropdown.. PARANG CLASS INSTANTIATION

        // placeholder for the search field
        customPlaceholderText: "Search Cafe...",

        // default CSS classes
        wrapperClass: 'autocomplete-dropdown',  //PAG EEDIT NYO YUNG DESIGN NG SEARCHBAR, PUNTA LANG KAYO SA DITO > autoComplete/dist/css/autocompleteDropdown.css
        inputClass: 'acdd-input',

        // allows additions to the select field
        allowAdditions: false,  //FALSE LANG MUNA, ETO YUNG MAKAKAPAGDAGDAG KA NG ITEM SA DROPDOWN E..

        // text to show when no results
        noResultsText: 'No results found',

        // callbacks
        onChange: function() {
            var value = $('select').val();  //DITONG PART KINUKUHA NATIN YUNG VALUE NG NASELECT SA DROPDOWN TAPOS NILALAGAY NATIN KASAMA NG LINK PAG NAG MOVE TAYO NG PAGE
            window.location.href = 'readPage.php?val=' + value;
        },
        onSelect: function() {
            
        },
    })
);