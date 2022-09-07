<?php

namespace App\Custom;

class Modal
{

    public function modalAlerta($color, $tituloModal, $contenido)
    {
        echo "<div class='modal fade' id='modalAlerta' data-bs-backdrop='static' data-bs-keyboard='false' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>";
        echo "  <div class='modal-dialog modal-dialog-centered'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header  border-0'>";
        echo "        <h5 class='modal-title $color' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "                <button type='button' class='btn-close' id='close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo        $contenido;
        echo "       </div>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalAlerta').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

    public function modalInformativa($color, $tituloModal, $contenido)
    {
        echo "<div class='modal fade' id='modalInformativa' tabindex='-1' aria-labelledby='staticBackdropLabel' aria-hidden='true'>";
        echo "  <div class='modal-dialog modal-dialog-centered'>";
        echo "    <div class='modal-content'>";
        echo "      <div class='modal-header  border-0'>";
        echo "        <h5 class='modal-title $color' id='exampleModalLabel'>" . $tituloModal . "</h5>";
        echo "                <button type='button' class='btn-close' id='close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "      </div>";
        echo "      <div class='modal-body'>";
        echo        $contenido;
        echo "       </div>";
        echo "      </div>";
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalInformativa').modal('show')</script>";
    }

    public function modalForm($color, $tituloModal, $contenido)
    {

        echo "<div class='modal fade' id='modalForm' role='dialog'>";
        echo "  <div class='modal-dialog'>";
        echo "      <div class='modal-content'>";
        echo "<!-- Modal Header -->";
        echo "          <div class='modal-header'>";
        echo "              <h4 class='modal-title $color' id='myModalLabel'>$tituloModal</h4>";
        echo "                  <button type='button' class='btn-close' id='close' data-bs-dismiss='modal' aria-label='Close'></button>";
        echo "          </div>";
        echo "<!-- Modal Body -->";
        echo "          <div class='modal-body'>";
        echo "              <p class='statusMsg'></p>";
        echo $contenido;
        echo "          </div>";
        echo "      </div>";
        echo "  </div>";
        echo "</div>";
        echo "<script>$('#modalForm').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }
}
