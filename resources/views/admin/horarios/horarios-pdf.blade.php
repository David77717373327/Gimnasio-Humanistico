{{-- resources/views/admin/horarios/horarios-pdf.blade.php --}}

<style>
  /* Contenedor y encabezado */
  #horario-pdf { font-family: 'Poppins', Arial, sans-serif; background:#fff; padding:20px; border-radius:12px; }
  .pdf-header { background: linear-gradient(135deg, #3B82F6, #10B981); padding: 20px; border-radius: 12px; margin-bottom: 20px; color:#fff; }
  .pdf-title { font-size:28px; font-weight:700; margin:0; }
  .pdf-subtitle { font-size:18px; margin:6px 0 0; }
  .pdf-periodo { font-size:14px; }

  /* Tabla */
  .pdf-table { width:100%; border-collapse: collapse; border-radius:12px; overflow:hidden; font-size:13px; }
  .pdf-thead { background: #F8FAFC; }
  .pdf-hora-col, .pdf-dia-col { text-align:center; font-weight:700; padding:8px; border:1px solid #E2E8F0; color:#1F2937; }
  .pdf-hora-col { background: linear-gradient(135deg, #DBEAFE, #BFDBFE); width:100px; }
  .pdf-row:nth-child(even) { background:#F9FAFB; }
  .pdf-hora-cell { padding:6px; text-align:center; border:1px solid #E2E8F0; background:#F1F5F9; }
  .pdf-hora-content strong { display:block; font-size:12px; color:#1E40AF; }
  .pdf-hora-content small { font-size:11px; color:#555; }

  /* Celdas de clase */
  .pdf-clase-cell { text-align:center; border:1px solid #E2E8F0; padding:8px; border-radius:8px; vertical-align:middle; }
  .pdf-clase-vacia { background:#F3F4F6; border-radius:8px; border:1px dashed #CBD5E0; padding:8px; }
  .pdf-placeholder { color:#718096; font-size:11px; font-style:italic; }

  /* Materia y profesor en columnas (una debajo de la otra) */
  .materia-titulo { display:block; font-weight:700; font-size:13px; margin-bottom:2px; }
  .materia-profesor { display:block; font-size:11px; font-style:italic; color:#374151; }

  /* Colores por materia (extiende este mapa si quieres) */
  .materia-matematicas   { background:#DBEAFE; color:#1E3A8A; border-left:6px solid #3B82F6; border-radius:8px; padding:6px; }
  .materia-ciencias      { background:#DCFCE7; color:#166534; border-left:6px solid #22C55E; border-radius:8px; padding:6px; }
  .materia-sociales      { background:#FEF9C3; color:#92400E; border-left:6px solid #F59E0B; border-radius:8px; padding:6px; }
  .materia-espanol       { background:#FCE7F3; color:#9D174D; border-left:6px solid #EC4899; border-radius:8px; padding:6px; }
  .materia-ingles        { background:#E0F2FE; color:#075985; border-left:6px solid #38BDF8; border-radius:8px; padding:6px; }
  .materia-arte          { background:#F3E8FF; color:#6B21A8; border-left:6px solid #A855F7; border-radius:8px; padding:6px; }
  .materia-educacionfisica{ background:#D1FAE5; color:#065F46; border-left:6px solid #10B981; border-radius:8px; padding:6px; }
  .materia-generica      { background:#EEF2FF; color:#3730A3; border-left:6px solid #6366F1; border-radius:8px; padding:6px; }

  /* Recreo */
  .pdf-break-row { background: linear-gradient(135deg, #FFE4E6, #FEF3C7); }
  .pdf-break-cell { text-align:center; padding:10px; font-weight:700; font-size:14px; color:#1F2937; }

  /* Footer */
  .pdf-footer { margin-top:20px; font-size:12px; color:#444; }
  .pdf-footer-text { margin:5px 0; }
</style>

@php
  // Rango de horas y respaldo seguro si no viene $horarios
  $inicio = $inicio ?? 7;
  $fin    = $fin ?? 13;
  $horariosCollection = collect($horarios ?? []); // <- evita "Undefined variable $horarios"

  // Mapeo Materia -> clase CSS
  $colorMap = [
    'Matemáticas' => 'materia-matematicas',
    'Matematicas' => 'materia-matematicas',
    'Ciencias' => 'materia-ciencias',
    'Sociales' => 'materia-sociales',
    'Español' => 'materia-espanol',
    'Inglés' => 'materia-ingles',
    'Ingles' => 'materia-ingles',
    'Arte' => 'materia-arte',
    'Educación Física' => 'materia-educacionfisica',
    'Educacion Fisica' => 'materia-educacionfisica',
  ];
@endphp

<div id="horario-pdf" class="d-none">
  <div class="pdf-header text-center mb-4">
    <h2 class="pdf-title">📚 HORARIO DE CLASES</h2>
    <h3 class="pdf-subtitle">Grado: {{ $grado->nombre ?? '' }}</h3>
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
      @for ($h = $inicio; $h < $fin; $h++)
        <tr class="pdf-row">
          {{-- Columna de hora --}}
          <td class="pdf-hora-cell">
            <div class="pdf-hora-content">
              <strong>{{ sprintf('%02d:00', $h) }}</strong>
              <small>{{ sprintf('%02d:00', $h+1) }}</small>
            </div>
          </td>

          {{-- Días 1..5 --}}
          @for ($d = 1; $d <= 5; $d++)
            @php
              // Busca si hay clase para (hora = $h, dia = $d)
              $item = $horariosCollection->where('hora', $h)->where('dia', $d)->first();

              // Obtén nombres y clase CSS
              $materiaNombre  = $item->materia->nombre  ?? ($item->materia_nombre  ?? null);
              $profesorNombre = $item->profesor->name   ?? ($item->profesor->nombre ?? ($item->profesor_nombre ?? null));
              $claseCSS = $materiaNombre ? ($colorMap[$materiaNombre] ?? 'materia-generica') : '';
            @endphp

            <td class="pdf-clase-cell"
                data-pdf-dia="{{ $d }}"
                data-pdf-inicio="{{ sprintf('%02d:00', $h) }}">
              @if($materiaNombre && $profesorNombre)
                <div class="{{ $claseCSS }}">
                  <span class="materia-titulo">{{ $materiaNombre }}</span>
                  <span class="materia-profesor">{{ $profesorNombre }}</span>
                </div>
              @else
                <div class="pdf-clase-vacia">
                  <span class="pdf-placeholder">Libre</span>
                </div>
              @endif
            </td>
          @endfor
        </tr>

        {{-- Recreo a las 9:00–9:30 --}}
        @if ($h == 9)
          <tr class="pdf-break-row">
            <td colspan="6" class="pdf-break-cell">
              🍎 <strong>RECREO</strong> — 09:00 - 09:30
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
  </div>
</div>
