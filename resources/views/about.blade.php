@extends('layout/main')

@section('title', 'About')

@section('container')

<!-- about -->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h2 class="text-center">About, {{$nama ?? ''}}</h2>
                <hr>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-6 text-justify">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam veritatis laborum ea voluptatum
                    quis
                    sapiente dolores libero ducimus ut minus alias sint sunt animi, perspiciatis iusto. Autem sunt
                    excepturi laudantium.</p>
            </div>
            <div class="col-sm-6 text-justify">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas, amet ea minima sit impedit est
                    dolor. Quaerat nam iure eligendi nihil, a omnis vero numquam, dolore ea eveniet aliquam
                    asperiores.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- about -->
@endsection