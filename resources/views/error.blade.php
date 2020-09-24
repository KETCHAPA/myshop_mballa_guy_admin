@php
    if(sizeof($errors) > 0) {
        echo('<div id="alert-container" class="alert alert-' . $errors->all()[1] .' ">' . $errors->all()[0] . '</div>');
    }
@endphp