<div id="modalCafe" class="modal-overlay">
    <div class="modal-container">
        <div class="cafe-image-container">
            <img id="modalCafeImg" src="/assets/img/user.png" alt="Cafetería">
        </div>
        <div class="modal-header">
            <h2 id="modalCafeName">Nombre de la Cafetería</h2>
            <button class="btn-close-modal" onclick="closeModal('modalCafe')">&times;</button>
        </div>
        <div class="modal-body">
            <div class="cafe-details">
                <p id="modalCafeAddress"><i class="fa-solid fa-location-dot"></i> Cargando...</p>
                <p id="modalCafeHours"><i class="fa-regular fa-clock"></i> Cargando...</p>
                <p id="modalCafePhone"><i class="fa-solid fa-phone"></i> Cargando...</p>
                
                <div id="modalCafeWebContainer" style="margin-top: 10px; margin-bottom: 15px; display: none;">
                    <a id="modalCafeWeb" href="#" target="_blank" style="color: var(--color-caramel); text-decoration: none; font-weight: 600;">
                        <i class="fa-solid fa-globe"></i> Visitar sitio web
                    </a>
                </div>

                <div class="mas-datos-wrapper" style="margin-top: 15px; border-top: 1px solid var(--color-steam); padding-top: 10px;">
                    <button id="btnToggleDatos" style="background: none; border: none; color: var(--color-espresso); font-weight: 600; cursor: pointer; width: 100%; text-align: left; padding: 5px 0;">
                        <i class="fa-solid fa-circle-plus" style="color: var(--color-caramel);"></i> Más datos <span id="datosChevron" style="float: right;"><i class="fa-solid fa-chevron-down"></i></span>
                    </button>
                    
                    <div id="masDatosContent" style="display: none; margin-top: 10px; font-size: 0.9rem; color: var(--color-roast);">
                        <ul id="listaMasDatos" style="list-style-type: none; padding-left: 0; line-height: 1.6;">
                            </ul>
                    </div>
                </div>

                <p id="modalCafeId" style="font-size: 0.7rem; color: var(--color-steam); margin-top: 1rem;"></p>
            </div>
            <button class="btn-primario" style="width: 100%; margin-top: 1rem; background: var(--color-caramel); color: white; border: none; padding: 10px; border-radius: 5px; cursor: pointer; font-family: var(--font);">
                Añadir la primera foto
            </button>
        </div>
    </div>
</div>