@extends('layouts.app')
@section('content')
    <div class="container">
        <h2 align="center"> Naša práca </h2>
        <?php
        /** @var $article
         *
         */

        $target_dir = "uploads/";
        $pocitadlo = 0;
        foreach ($item as $picture) {

        $target_file = $target_dir . $picture['filename'];
        if ($pocitadlo%2 == 0) { ?>
        <div class="row">
            <?php } ?>

            <div class="column">
                <div class="card" style="width: 30rem; height: 35rem;">
                    <h5 class="card-title"><?=$picture['title']?></h5>
                    <?php if($picture['filename'] != null)  {  ?>
                    <div class="pricelist">
                        <img src="{{ asset('storage/images/' . $picture['filename']) }}" class="card-img-top" alt="...">
                    </div>
                    <?php } ?>
                    <div class="card-body">
                        <p class="card-title"><?=$picture['text']?></p>
                        @auth
                            @if (Auth::user()->name == 'admin')
                                <a href="{{ route('gallery.edit', $picture['id']) }}" class="btn btn-primary btn-sm" id="right-panel-link">Editovať</a>
                                <a href="{{ route('gallery.delete', $picture['id']) }}" class="btn btn-danger btn-sm" id="left-panel-link">Zmazať</a>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

            <?php
            if ($pocitadlo%2 == 1) { ?>
        </div>

        <?php
        }
        $pocitadlo++;
        }
        ?>

        <?php if ($pocitadlo%2 == 1) { ?> </div>  <?php } ?>



    </div>
    @auth
        @if (Auth::user()->name == 'admin')
            <div class="horizontally-center">
                <a href="{{ route('gallery.create') }}"><button class="btn-primary btn-success">Pridať položku</button></a>
            </div>
        @endif
    @endauth

@endsection
