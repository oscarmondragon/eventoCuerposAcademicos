<?php

namespace App\Livewire\Forms;

use App\Models\Archivo;
use App\Models\Banner;
use App\Models\FortalezaNecesidad;
use App\Models\Integrantes;
use App\Models\Linea;
use Livewire\WithFileUploads;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\SubareaToRegistro;
use Livewire\Attributes\Validate;
use Livewire\Form;

class ParticipantesForm extends Form
{
    use WithFileUploads;

    //GENERALES
    #[Validate('required|gt:0')]
    public $tipoRegistro = 0;

    #[Validate('required|max:150')]
    public $nombreGrupo = '';

    #[Validate('required|max:50')]
    public $pais = "México";

    #[Validate('required|min:10|max:15|regex:/^[0-9()+]*$/u')]
    public $telefonoGeneral = '';

    #[Validate('required|email|unique:registros,email|max:100')]
    public $correoGeneral = '';

    #[Validate('required|same:correoGeneral')]
    public $correoGeneralConfirmacion;

    #[Validate('required|max:150')]
    public $lugarProcedencia = '';

    #[Validate('required')]
    public $areaSeleccionada;

    #[Validate('required|array|min:1')]
    public $subareasSeleccionadas = [];

    #[Validate('required|array|min:1')]
    public $lineasInvestigacion;

    #[Validate('required|max:500')]
    public $productosLogrados = '';

    #[Validate('required|max:500')]
    public $casosExito = '';

    #[Validate('required|max:500')]
    public $propuestas = '';

    #[Validate('required|max:500')]
    public $fortalezas = '';

    #[Validate('required|max:500')]
    public $necesidades = '';

    //INTEGRANTES
    //lider
    #[Validate('required|array|min:1|max:1')]
    public $lideres;

    #[Validate('required|array|min:1')]
    public $integrantes;

    //BANNER
    #[Validate('required|max:150')]
    public $nombreGrupoBanner = '';
    #[Validate('required|max:150')]
    public $lugarProcedenciaBanner = '';



    #[Validate('required|max:500')]
    public $descripcionBanner = '';

    #[Validate('required|min:10|max:15|regex:/^[0-9()+]*$/u')]
    public $telefonoBanner = '';

    #[Validate('required|email|max:100')]
    public $correoBanner = '';

    #[Validate('required')]
    public $areaSeleccionadaBanner;

    #[Validate('nullable|max:50')]
    public $facebook = '';

    #[Validate('nullable|max:50')]
    public $x = '';

    #[Validate('nullable|max:50')]
    public $youtube = '';

    #[Validate('nullable|max:50')]
    public $otraRed = '';

    //BOUCHER
    #[Validate('nullable|mimes:jpg,pdf,png|max:2048')]
    public $boucher = null;

    #[Validate('accepted')]
    public $aceptoDatos = false;


    public $adjuntoPago = false; //Sirve para saber si adjunto boucher o no y asi poder enviar diferente notificacion por mail

    public $idCuerpoAcademico;

    protected $messages = [
        'tipoRegistro.required' => 'La procedencia no puede estar vacía.',
        'tipoRegistro.gt' => 'La procedencia no puede estar vacía.',

        'nombreGrupo.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'nombreGrupo.max' => 'El nombre del Cuerpo Académico es demasiado largo.',
        'lugarProcedencia.required' => 'El nombre de la universidad, dependencia o departamento de adscripción no puede estar vacío.',
        'lugarProcedencia.max' => 'El nombre de la universidad es demasiado largo.',
        'pais.required' => 'El país no puede estar vacío.',
        // 'pais.gt' => 'El país no puede estar vacío.',
        'pais.max' => 'El país es demasiado largo.',
        'telefonoGeneral.required' => 'El teléfono de contacto no puede estar vacío.',
        'telefonoGeneral.min' => 'El teléfono de contacto debe de contener al menos 10 dígitos.',
        'telefonoGeneral.max' => 'El teléfono de contacto es demasiado largo.',
        'telefonoGeneral.regex' => 'El formato del teléfono no es valido (Solo acepta los caracteres especiales: (), +).',

        'correoGeneral.required' => 'El correo electrónico no puede estar vacío.',
        'correoGeneral.email' => 'El coreo electrónico no tiene un formato valido.',
        'correoGeneral.unique' => 'El correo electrónico ya existe.',
        'correoGeneral.max' => 'El correo electrónico es demasiado largo.',

        'correoGeneralConfirmacion.required' => 'El correo electrónico de confirmación no puede estar vacío.',
        'correoGeneralConfirmacion.same' => 'El correo electrónico de confirmación no coincide.',

        'subareasSeleccionadas.required' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'subareasSeleccionadas.array' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'subareasSeleccionadas.min' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'lineasInvestigacion.required' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',
        'lineasInvestigacion.array' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',
        'lineasInvestigacion.min' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',

        'productosLogrados.required' => 'Los productos logrados no pueden estar vacíos.',
        'productosLogrados.max' => 'Los productos logrados solo admiten máximo 500 caracteres.',

        'casosExito.required' => 'Los casos de éxito de trasnferencia no pueden estar vacíos.',
        'casosExito.max' => 'Los casos de éxito de trasnferencia solo admite máximo 500 caracteres.',

        'propuestas.required' => 'La proyección y propuesta de vinculación no puede estar vacía.',
        'propuestas.max' => 'La proyección y propuesta de vinculación solo admite máximo 500 caracteres.',

        'fortalezas.required' => 'Las fortalezas no pueden estar vacías.',
        'fortalezas.max' => 'Las fortalezas solo admiten máximo 500 caracteres.',

        'necesidades.required' => 'Las necesidades no pueden estar vacías.',
        'necesidades.max' => 'Las necesidades solo admiten máximo 500 caracteres.',

        'aceptoDatos.accepted' => 'Debes de aceptar el aviso de privacidad.',

        'lideres.required' => 'Debes de agregar un líder.',
        'lideres.min' => 'Debe ser por lo menos un líder.',
        'lideres.max' => 'Solo puede haber un líder.',
        'integrantes.required' => 'Debes de agregar por lo menos un integrante o colaborador.',
        'integrantes.min' => 'Debes de agregar por lo menos un integrante o colaborador.',

        'nombreGrupoBanner.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'nombreGrupoBanner.max' => 'El nombre del Cuerpo Académico es demasiado largo.',

        'lugarProcedenciaBanner.required' => 'El campo de institución de procedencia no puede estar vacío.',
        'lugarProcedenciaBanner.max' => 'El campo de institución de procedencia es demasiado largo.',

        'areaSeleccionadaBanner.required' => 'El campo de área temática no puede estar vacio.',

        'descripcionBanner.required' => 'La descripción de su principal línea de generación no puede estar vacía.',
        'descripcionBanner.max' => 'La descripción de su principal línea de generación es demasiado larga.',

        'telefonoBanner.required' => 'El teléfono de contacto para el baner no puede estar vacío.',
        'telefonoBanner.min' => 'El teléfono de contacto para el baner debe de contener al menos 10 dígitos.',
        'telefonoBanner.max' => 'El teléfono de contacto para el baner es demasiado largo.',
        'telefonoBanner.regex' => 'El formato del teléfono para el baner no es valido (Solo acepta los caracteres especiales: (), +).',

        'correoBanner.required' => 'El correo electrónico no puede estar vacío.',
        'correoBanner.email' => 'El coreo electrónico no tiene un formato valido.',
        'correoBanner.max' => 'El correo electrónico es demasiado largo.',

        'facebook.max' => 'Nombre de Facebook demasiado largo.',
        'x.max' => 'Nombre de X demasiado largo.',
        'youtube.max' => 'Nombre de YouTube demasiado largo.',

        'otraRed.max' => 'El nombre de esta red social es demasiado largo.',

        'boucher.max' => 'El archivo debe pesar máximo 2 MB.',
        'boucher.mimes' => 'El archivo debe ser de tipo: jpg, pdf, png.',


    ];


    public function store()
    {
        $this->validate();

        DB::beginTransaction();
        try {
            $registro = new Registro;

            if ($this->tipoRegistro == 1) {
                $this->tipoRegistro = "Interno";
            } else if ($this->tipoRegistro == 2) {
                $this->tipoRegistro = "Externo";
            } else {
                return "Procedencia invalida.";
            }

            if (!empty($this->boucher)) {
                $this->adjuntoPago = true;
            }

            //Guardamos los datos del registro
            $registro->tipo_solicitante = $this->tipoRegistro;
            $registro->cuerpo_grupo_red = $this->nombreGrupo;
            $registro->productos_logrados = $this->productosLogrados;
            $registro->casos_exito = $this->casosExito;
            $registro->servicios_proyectos = $this->propuestas;
            $registro->pais = $this->pais;
            $registro->espacio_procedencia = $this->lugarProcedencia;
            $registro->email = $this->correoGeneral;
            $registro->telefono = $this->telefonoGeneral;
            $registro->aceptoDatos = $this->aceptoDatos;
            $registro->adjuntoPago = $this->adjuntoPago;

            $registro->save();

            //Guardamos fortalezas y necesidades
            $fortalezaDB = new FortalezaNecesidad; //Creamos una instancia de linea
            $fortalezaDB->registro_id = $registro->id;
            $fortalezaDB->descripcion = $this->fortalezas;
            $fortalezaDB->tipo = 'Fortaleza';
            $fortalezaDB->save();

            $necesidadDB = new FortalezaNecesidad; //Creamos una instancia de linea
            $necesidadDB->registro_id = $registro->id;
            $necesidadDB->descripcion = $this->necesidades;
            $necesidadDB->tipo = 'Necesidad';
            $necesidadDB->save();

            //Guaradamos lider e integrantes
            foreach ($this->lideres as $lider) {
                $liderIntegrante = new Integrantes; //Creamos una instancia de integrante

                $liderIntegrante->registro_id = $registro->id;
                $liderIntegrante->nombre = $lider['nombre'];
                $liderIntegrante->apellido_paterno = $lider['apellidoPaterno'];
                $liderIntegrante->apellido_materno = $lider['apellidoMaterno'];
                $liderIntegrante->grado_academico = $lider['gradoAcademico'];
                $liderIntegrante->grado_academico_abreviado = $lider['gradoAcademicoAbrev'];
                $liderIntegrante->sexo = $lider['sexo'];
                $liderIntegrante->genero = $lider['genero'];
                $liderIntegrante->email = $lider['correo'];
                $liderIntegrante->telefono = $lider['telefono'];
                $liderIntegrante->tipo = 'Lider';
                $liderIntegrante->tipo_lider = $lider['tipoLider'];

                $liderIntegrante->save();
            }


            foreach ($this->integrantes as $integrante) {

                $integranteDB = new Integrantes; //Creamos una instancia de integrante

                $integranteDB->registro_id = $registro->id;
                $integranteDB->nombre = $integrante['nombre'];
                $integranteDB->apellido_paterno = $integrante['apellidoPaterno'];
                $integranteDB->apellido_materno = $integrante['apellidoMaterno'];
                $integranteDB->grado_academico = $integrante['gradoAcademico'];
                $integranteDB->grado_academico_abreviado = $integrante['gradoAcademicoAbrev'];
                $integranteDB->sexo = $integrante['sexo'];
                $integranteDB->genero = $integrante['genero'];
                $integranteDB->email = $integrante['correo'];
                $integranteDB->telefono = $integrante['telefono'];
                $integranteDB->tipo = $integrante['tipoIntegrante'];
                $integranteDB->tipo_lider = null;

                $integranteDB->save();
            }

            //Guardamos lineas de generacion
            foreach ($this->lineasInvestigacion as $linea) {

                $lineaDB = new Linea; //Creamos una instancia de linea
                $lineaDB->registro_id = $registro->id;
                $lineaDB->nombre = $linea['nombre'];
                $lineaDB->descripcion = $linea['descripcion'];

                $lineaDB->save();
            }

            //Guardamos datos del banner

            $IntegrantesCompleto = $this->integrantes->merge($this->lideres); //combinamos las colecciones de integrantes y lider

            $integrantesFiltrado = $IntegrantesCompleto->map(function ($item) { //creamos una coleccion con menos campos para guardarlos en la tabla banner
                return [
                    '_id' => $item['_id'],
                    'nombre' => $item['nombre'],
                    'apellidoPaterno' => $item['apellidoPaterno'],
                    'apellidoMaterno' => $item['apellidoMaterno'],
                    'tipoLider' => $item['tipoLider'],
                    'tipo' => $item['tipoIntegrante'],

                ];
            });

            $bannerDB = new Banner; //Creamos una instancia del modelo Banner

            $bannerDB->registro_id = $registro->id;
            $bannerDB->cuerpo_grupo_red = $this->nombreGrupoBanner;
            $bannerDB->espacio_procedencia = $this->lugarProcedenciaBanner;
            $bannerDB->area_tematica = $this->areaSeleccionadaBanner;
            $bannerDB->integrantes = json_encode($integrantesFiltrado); // convertimos los integrantes en JSON
            $bannerDB->descripcion_linea = $this->descripcionBanner;
            $bannerDB->email = $this->correoBanner;
            $bannerDB->telefono = $this->telefonoBanner;
            $bannerDB->facebook = $this->facebook;
            $bannerDB->youtube = $this->youtube;
            $bannerDB->twitter = $this->x;
            $bannerDB->otra_red = $this->otraRed;

            $bannerDB->save();

            //Guardamos las subareastoregistros

            foreach ($this->subareasSeleccionadas as $subarea) {

                $subareasToRegistroDB = new SubareaToRegistro; //Creamos una instancia del modelo SubareaToRegistro

                $subareasToRegistroDB->registro_id = $registro->id;
                $subareasToRegistroDB->subarea_id = $subarea['id'];

                $subareasToRegistroDB->save();
            }

            //Guardamos el boucher

            if (!empty($this->boucher)) {
                //Guardar en sistema de archivos
                $ruta_boucher = "public/" . $registro->id . "/Pago/";
                $extension = $this->boucher->getClientOriginalExtension();

                $this->boucher->storeAs($ruta_boucher, 'comprobante_pago.' . $extension);

                $rutaCompleta = $ruta_boucher . 'comprobante_pago.' . $extension;

                //guardar en DB
                $archivo = new Archivo;

                $archivo->registro_id = $registro->id;
                $archivo->ruta = $rutaCompleta;
                $archivo->tipo = "Boucher";
                $archivo->user_id = 0; //significa que no lo subio un usuario autenticado

                $archivo->save();
            }

            DB::commit();
            if (!empty($this->boucher)) {
                return redirect('/registro-creado')->with('success', 'Registro guardado correctamente con el correo ' . $this->correoGeneral . '. Te hemos enviado un correo electrónico con la confirmación del mismo, vamos a validar la información y  el pago , te notificaremos por correo electrónico cuando finalicemos.');

            } else {
                return redirect('/registro-creado')->with('success', 'Registro guardado correctamente con el correo ' . $this->correoGeneral . '. Te hemos enviado un correo electrónico con la confirmación del mismo. Si aun no has
                completado el
                pago no te preocupes, puedes completarlo y adjuntar tu evidencia desde el link que
                te hemos enviado por correo.');

            }
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('errorDb', 'Error al guardar el registro. Por favor, revisa que todos los campos esten correctamente llenados e intente más tarde. Si el problema persiste contacte al administrador del sistema. ' . $e->getMessage());
        }
    }
}
