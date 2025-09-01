{{-- 
  Vista separada para el PDF del horario escolar
  Archivo: resources/views/admin/horarios/horarios-pdf.blade.php
--}}

<div id="horario-pdf" class="d-none">
  <div class="pdf-header text-center mb-4">
    <h2 class="pdf-title">📚 HORARIO DE CLASES</h2>
    <h3 class="pdf-subtitle" id="pdf-grado-nombre">Grado: </h3>
    <p class="pdf-periodo">Año Lectivo {{ date('Y') }}</p>
  </div>
  
  <table class="table pdf-table">
    <thead>
      <tr class="pdf-thead">
        <th class="pdf-hora-col">⏰ HORA</th>
        <th class="pdf-dia-col">🌅 LUNES</th>
        <th class="pdf-dia-col">🌞 MARTES</th>
        <th class="pdf-dia-col">🌤️ MIÉRCOLES</th>
        <th class="pdf-dia-col">☀️ JUEVES</th>
        <th class="pdf-dia-col">🌟 VIERNES</th>
      </tr>
    </thead>
    <tbody id="pdf-tbody">
      @php
        $inicio = 7; 
        $fin = 13; // 7:00 a 13:00
      @endphp

      @for ($h = $inicio; $h < $fin; $h++)
        <tr class="pdf-row">
          <td class="pdf-hora-cell">
            <div class="pdf-hora-content">
              <strong>{{ sprintf('%02d:00', $h) }}</strong>
              <small>{{ sprintf('%02d:00', $h+1) }}</small>
            </div>
          </td>
          @for ($d = 1; $d <= 5; $d++)
            <td class="pdf-clase-cell" 
                data-pdf-dia="{{ $d }}" 
                data-pdf-inicio="{{ sprintf('%02d:00', $h) }}">
              <div class="pdf-clase-vacia">
                <span class="pdf-placeholder">Libre</span>
              </div>
            </td>
          @endfor
        </tr>

        {{-- Descanso a las 9:00–9:30 --}}
        @if ($h == 9)
          <tr class="pdf-break-row">
            <td colspan="6" class="pdf-break-cell">
              <div class="pdf-break-content">
                <span class="pdf-break-icon">🍎</span>
                <strong>RECREO</strong>
                <span class="pdf-break-time">09:00 - 09:30</span>
              </div>
            </td>
          </tr>
        @endif
      @endfor
    </tbody>
  </table>

  <div class="pdf-footer mt-4">
    <div class="row">
      <div class="col-6">
        <p class="pdf-footer-text">
          <strong>📅 Fecha de generación:</strong><br>
          {{ date('d/m/Y H:i') }}
        </p>
      </div>
      <div class="col-6 text-end">
        <p class="pdf-footer-text">
          <strong>🏫 Sistema Escolar</strong><br>
          Gestión Académica
        </p>
      </div>
    </div>
    
    {{-- Información adicional del grado si está disponible --}}
    @if(isset($grado))
      <div class="row mt-3">
        <div class="col-12 text-center">
          <div class="pdf-footer-text">
            <strong>{{ $grado->nombre ?? 'Grado' }}</strong>
            @if(isset($grado->descripcion))
              <br><small>{{ $grado->descripcion }}</small>
            @endif
          </div>
        </div>
      </div>
    @endif
  </div>
</div>