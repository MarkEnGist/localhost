$(document).ready(function () {
    $('.calc select').change(function () {
        $edition = $('select#card_edition').val();
        $paper = $('select#card_paper').val();
        $color = $('select#card_color').val();
        $color_format = $('select#card_color option:selected').attr('data-color');
        $print_file = $('select#card_color option:selected').attr('data-print-file');
        $paper_ratio = $('select#card_paper option:selected').attr('data-paper-ratio');
        $print = $('select#card_color option:selected').attr('data-print');
        $division = 30;
        $final_edition = $edition / $division;
        $price = $final_edition * $paper_ratio + parseInt($print_file) + $final_edition * $print;
        console.log($paper_ratio + ' ' + $final_edition);
        $('.calc .price #final_price').text($price);
        switch ($color_format) {
            case '5':
                $('.card-images img').hide();
                $('#card_4_4').show();
                break;
            case '2':
                $('.card-images img').hide();
                $('#card_1_1').show();
                break;
            case '3':
                $('.card-images img').hide();
                $('#card_4_0').show();
                break;
            case '4':
                $('.card-images img').hide();
                $('#card_4_1').show();
                break;
            default:
                $('.card-images img').hide();
                $('#card_1_0').show();
        }


    });
});