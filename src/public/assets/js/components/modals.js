$(document).ready(function() {
    $('#btnToggleDatos').on('click', function() {
        $('#masDatosContent').slideToggle(300);
        
        const $icono = $('#datosChevron i');
        if ($icono.hasClass('fa-chevron-down')) {
            $icono.removeClass('fa-chevron-down').addClass('fa-chevron-up');
        } else {
            $icono.removeClass('fa-chevron-up').addClass('fa-chevron-down');
        }
    });
});

/**
 * FUNCIONES GLOBALES DE CONTROL
 */
window.openModal = function(id) {
    $('#' + id).css('display', 'flex').hide().fadeIn(200);
};

window.closeModal = function(id) {
    $('#' + id).fadeOut(200, function() {
        $(this).css('display', 'none');
    });
    
    if (id === 'modalCafe') {
        $('#masDatosContent').hide();
        $('#datosChevron i').removeClass('fa-chevron-up').addClass('fa-chevron-down');
    }
};

window.onclick = function(event) {
    if (event.target.classList.contains('modal-overlay')) {
        window.closeModal(event.target.id);
    }
};

function showCafeModal(data) {
    $('#modalCafeName').text(data.nombre);
    
    $('#modalCafeAddress').empty().append('<i class="fa-solid fa-location-dot" style="width:20px"></i> ').append(document.createTextNode(data.calle));
    $('#modalCafeHours').empty().append('<i class="fa-regular fa-clock" style="width:20px"></i> ').append(document.createTextNode(data.horario));
    
    // Teléfono
    const $phoneEl = $('#modalCafePhone');
    if (data.telefono) {
        $phoneEl.empty().append('<i class="fa-solid fa-phone" style="width:20px"></i> ').append(document.createTextNode(data.telefono));
        $phoneEl.show();
    } else {
        $phoneEl.hide();
    }

    // ID y Foto
    $('#modalCafeId').text(`ID OSM: ${data.id_osm}`);
    $('#modalCafeImg').attr('src', data.foto ? data.foto : '/assets/img/user.png');

    // Enlace Web
    const $webContainer = $('#modalCafeWebContainer');
    if (data.web) {
        const urlSegura = data.web.startsWith('http') ? data.web : `http://${data.web}`;
        $('#modalCafeWeb').attr('href', urlSegura);
        $webContainer.show();
    } else {
        $webContainer.hide();
    }

    // --- SECCIÓN MÁS DATOS ---
    const $listaDatos = $('#listaMasDatos');
    $listaDatos.empty();

    let hayDatosExtra = false;

    if (data.wifi) {
        $listaDatos.append(`<li><i class="fa-solid fa-wifi" style="width:25px"></i> Wifi: <b>${data.wifi}</b></li>`);
        hayDatosExtra = true;
    }
    if (data.sillaRuedas) {
        $listaDatos.append(`<li><i class="fa-solid fa-wheelchair" style="width:25px"></i> Silla de ruedas: <b>${data.sillaRuedas}</b></li>`);
        hayDatosExtra = true;
    }
    if (data.terraza) {
        $listaDatos.append(`<li><i class="fa-solid fa-chair" style="width:25px"></i> Terraza al aire libre: <b>${data.terraza}</b></li>`);
        hayDatosExtra = true;
    }
    if (data.tarjetas) {
        $listaDatos.append(`<li><i class="fa-regular fa-credit-card" style="width:25px"></i> Acepta tarjeta: <b>${data.tarjetas}</b></li>`);
        hayDatosExtra = true;
    }
    if (data.cocina) {
        const cocinaCap = data.cocina.charAt(0).toUpperCase() + data.cocina.slice(1);
        $listaDatos.append(`<li><i class="fa-solid fa-utensils" style="width:25px"></i> Especialidad: <b>${cocinaCap}</b></li>`);
        hayDatosExtra = true;
    }

    if (hayDatosExtra) {
        $('.mas-datos-wrapper').show();
    } else {
        $('.mas-datos-wrapper').hide();
    }

    window.openModal('modalCafe');
}

/**
 * MODAL GENÉRICO PARA ALERTAS Y ERRORES
 * @param {string} titulo - El encabezado del modal
 * @param {string} texto - El cuerpo del mensaje
 * @param {string} tipo - 'error', 'success', 'warning', 'info'
 */
window.showGenericModal = function(titulo, texto, tipo = 'info') {
    const colores = {
        'error': 'var(--color-error)',
        'success': 'var(--color-success)',
        'warning': 'var(--color-warning)',
        'info': 'var(--color-info)'
    };

    const colorElegido = colores[tipo] || 'var(--color-espresso)';

    $('#genericTitle').text(titulo).css('color', colorElegido);
    $('#genericText').text(texto);
    
    window.openModal('modalGeneric');
};