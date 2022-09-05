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
        echo "<div class='modal-dialog'>";
        echo "<div class='modal-content'>";
        echo "<!-- Modal Header -->";
        echo "<div class='modal-header'>";
        echo "<button type='button' class='close' data-dismiss='modal'>";
        echo "<span aria-hidden='true'></span>";
        echo "<span class='sr-only'>Close</span>";
        echo "</button>";
        echo "<h4 class='modal-title' id='myModalLabel'>Contact Form</h4>";
        echo "</div>";
        echo "<!-- Modal Body -->";
        echo "<div class='modal-body'>";
        echo "<p class='statusMsg'></p>";
        echo "<form role='form'>";
        echo "<div class='form-group'>";
        echo "<label for='inputName'>Name</label>";
        echo "<input type='text' class='form-control' id='inputName' placeholder='Enter your name'/>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='inputEmail'>Email</label>";
        echo "<input type='email' class='form-control' id='inputEmail' placeholder='Enter your email'/>";
        echo "</div>";
        echo "<div class='form-group'>";
        echo "<label for='inputMessage'>Message</label>";
        echo "<textarea class='form-control' id='inputMessage' placeholder='Enter your message'></textarea>";
        echo "</div>";
        echo "</form>";
        echo "</div>";
        echo "<!-- Modal Footer -->";
        echo "<div class='modal-footer'>";
        echo "<button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>";
        echo "<button type='button' class='btn btn-primary submitBtn' onclick='submitContactForm()'>SUBMIT</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "<script>$('#modalForm').modal('show')</script>";
        echo "<script>$('#close').click(function(){location.reload()});</script>";
    }

}
