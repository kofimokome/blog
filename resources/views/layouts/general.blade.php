@extends('layouts.master')

@section('row1')
    <section>
    <div class="container-fluid">
        <ul class="nav nav-pills nav-stacked nav-list">
            <li class="active"><a href="#">Home Page</a></li>
            <li><a href="#">Style Examples</a></li>
            <li >
                <ul class="nav nav-pills nav-stacked" style=" margin-left:19px;">
                    <li><a href="#">Three Column</a></li>
                    <li><a href="#">One column/no sidebar</a></li>
                    <li><a href="#">Another Link</a></li>
                </ul>
            </li>
            <li><a href="#">Three Column layout example</a></li>
            <li><a href="#">Lorem ipsdum dolore thr d</a></li>
            <li><a href="#">Miscelleneous loren ipsum</a></li>
        </ul>
    </div>
    </section>
@stop

@section('row2')
    <section>
    <div class="container">NEWS</div>
    <article style="margin-bottom: 20px; margin-top:20px;" class="container-fluid">
        <span class="btn btn-primary">Jul 21</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem minus molestias quaerat repellendus vel veniam voluptatem voluptates voluptatum! Beatae consequatur hic non quam. Hic itaque laboriosam nostrum praesentium vel!
    </article>
    <article class="container-fluid">
        <span class="btn btn-primary">May 09</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque autem minus molestias quaerat repellendus vel veniam voluptatem voluptates voluptatum! Beatae consequatur hic non quam. Hic itaque laboriosam nostrum praesentium vel!
    </article>
    </section>
@stop

@section('row3')
    <section>
    <div class="container">
        MAECENAS VARIUS
        <p>
            <a  href=""><u>Nam cursis nisi nec vivera iaculis</u></a>
        </p>
        <p>
            <a href=""><u>Interger lacina risus id nibh vestibulum</u></a>
        </p>
        <p>
            <a href=""><u>Mauris eget ante ut elit rutrum ornare</u></a>
        </p>
        <p>
            <a href=""><u>Vivanus quis orci et suscrit consequa</u></a>
        </p>
        <p>
            <a href=""><u>Nam eget tellus adiposcin hendfreit</u></a>
        </p>
    </div>
    </section>
@stop


