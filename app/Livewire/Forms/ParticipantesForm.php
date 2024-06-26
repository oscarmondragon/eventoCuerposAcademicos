<?php

namespace App\Livewire\Forms;

use App\Models\Archivo;
use App\Models\AreaToRegistro;
use App\Models\Banner;
use App\Models\FortalezaNecesidad;
use App\Models\Integrantes;
use App\Models\Linea;
use Livewire\WithFileUploads;
use App\Models\Registro;
use Illuminate\Support\Facades\DB;
use App\Models\SubareaToRegistro;
use Livewire\Attributes\Validate;
use Illuminate\Support\Str;
use Livewire\Form;

class ParticipantesForm extends Form
{
    use WithFileUploads;

    //GENERALES
    #[Validate('required|gt:0')]
    public $tipoRegistro = 0;

    #[Validate('required|min:3|max:200')]
    public $nombreGrupo = null;

    #[Validate('required|max:50')]
    public $pais = "México";

    #[Validate('required|min:10|max:15|regex:/^[0-9()+]*$/u')]
    public $telefonoGeneral = '';

    #[Validate("required|email|unique:registros,email|max:100|regex:'^[^@]+@[^@]+\.[a-zA-Z]{2,}$'")]
    public $correoGeneral = '';

    #[Validate('required|same:correoGeneral')]
    public $correoGeneralConfirmacion;

    #[Validate('required|min:3|max:150')]
    public $lugarProcedencia = null;

    #[Validate('required|uuid')]
    public $areaSeleccionada;

    #[Validate('required|array|min:1')]
    public $subareasSeleccionadas = [];

    #[Validate('required|array|min:1')]
    public $lineasInvestigacion;

    #[Validate('required|min:3|max:500')]
    public $productosLogrados = '';

    #[Validate('required|min:3|max:500')]
    public $casosExito = '';

    #[Validate('required|min:3|max:500')]
    public $propuestas = '';

    #[Validate('required|min:3|max:500')]
    public $fortalezas = '';

    #[Validate('required|min:3|max:500')]
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
    #[Validate('required|mimes:jpg,pdf,png|max:2048')]
    public $boucher = null;

    #[Validate('accepted')]
    public $aceptoDatos = false;

    #[Validate('accepted')]
    public $checkBanner = false;

    #[Validate('required_unless:boucher,null')]
    public $checkFactura;

    #[Validate('nullable|required_if:checkFactura,1|mimes:pdf|max:2048')]
    public $csf;

    public $adjuntoPago = false; //Sirve para saber si adjunto boucher o no y asi poder enviar diferente notificacion por mail

    public $idCuerpoAcademico;

    protected $messages = [
        'tipoRegistro.required' => 'La procedencia no puede estar vacía.',
        'tipoRegistro.gt' => 'La procedencia no puede estar vacía.',

        'nombreGrupo.required' => 'El nombre del Cuerpo Académico, red o grupo de investigación no puede estar vacío.',
        'nombreGrupo.min' => 'El nombre del Cuerpo Académico, red o grupo de investigación es muy corto.',
        'nombreGrupo.max' => 'El nombre del Cuerpo Académico es demasiado largo.',
        'lugarProcedencia.required' => 'El nombre de la universidad, dependencia o departamento de adscripción no puede estar vacío.',
        'lugarProcedencia.min' => 'El nombre de la universidad es muy corto.',
        'lugarProcedencia.max' => 'El nombre de la universidad es demasiado largo.',
        'pais.required' => 'El país no puede estar vacío.',
        // 'pais.gt' => 'El país no puede estar vacío.',
        'pais.max' => 'El país es demasiado largo.',
        'telefonoGeneral.required' => 'El teléfono de contacto no puede estar vacío.',
        'telefonoGeneral.min' => 'El teléfono de contacto debe de contener al menos 10 dígitos.',
        'telefonoGeneral.max' => 'El teléfono de contacto es demasiado largo.',
        'telefonoGeneral.regex' => 'El formato del teléfono no es valido (Solo acepta los caracteres especiales: (), +).',

        'correoGeneral.required' => 'El correo electrónico no puede estar vacío.',
        'correoGeneral.email' => 'El correo electrónico no tiene un formato valido.',
        'correoGeneral.unique' => 'Ya existe un registro con este correo electrónico.',
        'correoGeneral.max' => 'El correo electrónico es demasiado largo.',
        'correoGeneral.regex' => 'El coreo electrónico no tiene un formato valido.',

        'correoGeneralConfirmacion.required' => 'El correo electrónico de confirmación no puede estar vacío.',
        'correoGeneralConfirmacion.same' => 'El correo electrónico de confirmación no coincide.',

        'areaSeleccionada.required' => 'Debes de seleccionar un área temática.',
        'areaSeleccionada.uuid' => 'Área temática invalida.',

        'subareasSeleccionadas.required' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'subareasSeleccionadas.array' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'subareasSeleccionadas.min' => 'Debes de seleccionar por lo menos una área temática y una subárea.',
        'lineasInvestigacion.required' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',
        'lineasInvestigacion.array' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',
        'lineasInvestigacion.min' => 'Debes agregar por lo menos una linea de generación y aplicación del conocimiento.',

        'productosLogrados.required' => 'El campo de pincipales productos logrados no puede estar vacío.',
        'productosLogrados.min' => 'El campo de pincipales productos logrados es muy corto.',
        'productosLogrados.max' => 'Los productos logrados solo admiten máximo 500 caracteres.',

        'casosExito.required' => 'El campo de casos de éxito de transferencia no puede estar vacío.',
        'casosExito.min' => 'El campo de casos de éxito de transferencia es muy corto.',
        'casosExito.max' => 'Los casos de éxito de transferencia solo admite máximo 500 caracteres.',

        'propuestas.required' => 'La proyección y propuesta de vinculación no puede estar vacía.',
        'propuestas.min' => 'La proyección y propuesta de vinculación es muy corta.',
        'propuestas.max' => 'La proyección y propuesta de vinculación solo admite máximo 500 caracteres.',

        'fortalezas.required' => 'Las fortalezas no pueden estar vacías.',
        'fortalezas.min' => 'Las fortalezas son muy cortas.',
        'fortalezas.max' => 'Las fortalezas solo admiten máximo 500 caracteres.',

        'necesidades.required' => 'Las necesidades no pueden estar vacías.',
        'necesidades.min' => 'Las necesidades son muy cortas.',
        'necesidades.max' => 'Las necesidades solo admiten máximo 500 caracteres.',

        'aceptoDatos.accepted' => 'Debes de aceptar el aviso de privacidad.',
        'checkBanner.accepted' => 'Debes de aceptar que la información del banner esta correcta.',


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

        'boucher.required' => 'El comprobante de pago es requerido.',
        'boucher.max' => 'El archivo comprobante de pago debe pesar máximo 2 MB.',
        'boucher.mimes' => 'El archivo comprobante de pago debe ser de tipo: .jpg, .pdf, .png.',

        'checkFactura.required_unless' => 'Indica si requieres factura.',
        'csf.required_if' => 'La Constancia de Situación Fiscal es requerida.',
        'csf.max' => 'El archivo CSF debe pesar máximo 2 MB.',
        'csf.mimes' => 'El archivo CSF debe ser de tipo: .pdf',



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
            } else if ($this->tipoRegistro == 3) {
                $this->tipoRegistro = "Red";
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
            $registro->checkBanner = $this->checkBanner;
            $registro->adjuntoPago = $this->adjuntoPago;

            if ($this->boucher != null) {
                $registro->checkFactura = $this->checkFactura;
            } else {
                $registro->checkFactura = 0;
            }

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
                    'gradoAcademicoAbrev' => $item['gradoAcademicoAbrev'],
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

            //Guardamos en areaToRegistro
            $areaToRegistro = new AreaToRegistro;
            $areaToRegistro->registro_id = $registro->id;
            $areaToRegistro->area_id = $this->areaSeleccionada;

            $areaToRegistro->save();

            //Guardamos el boucher

            if (!empty($this->boucher)) {
                //Guardar en sistema de archivos
                $archivo = new Archivo;
                $id_boucher = Str::substr(Str::ulid(), 20, 26);

                $ruta_boucher = "public/" . $registro->id . "/Pago/";
                $extension = $this->boucher->getClientOriginalExtension();

                $this->boucher->storeAs($ruta_boucher, 'comprobante_pago_' . $id_boucher . '.' . $extension);

                $rutaCompleta = $ruta_boucher . 'comprobante_pago_' . $id_boucher . '.' . $extension;

                //guardar en DB

                $archivo->registro_id = $registro->id;
                $archivo->ruta = $rutaCompleta;
                $archivo->tipo = "Boucher";
                $archivo->user_id = 0; //significa que no lo subio un usuario autenticado

                $archivo->save();
            }

            if (!empty($this->csf) && $this->checkFactura == 1 && $this->boucher != null) {
                //Guardar en sistema de archivos
                $archivo = new Archivo;
                $id_csf = Str::substr(Str::ulid(), 20, 26);

                $ruta_csf = "public/" . $registro->id . "/Pago/";
                $extension = $this->csf->getClientOriginalExtension();

                $this->csf->storeAs($ruta_csf, 'CSF_' . $id_csf . '.' . $extension);

                $rutaCompleta = $ruta_csf . 'CSF_' . $id_csf . '.' . $extension;

                //guardar en DB

                $archivo->registro_id = $registro->id;
                $archivo->ruta = $rutaCompleta;
                $archivo->tipo = "CSF";
                $archivo->user_id = 0; //significa que no lo subio un usuario autenticado

                $archivo->save();
            }

            DB::commit();
            if (!empty($this->boucher)) {
                return redirect('/registro-creado')->with('success', 'El registro ha sido guardado correctamente con el correo ' . $this->correoGeneral . '. Te hemos enviado un correo electrónico desde la cuenta eicari_siea@uaemex.mx con la confirmación de tu registro. Vamos a validar la información de pago y desde esta cuenta de correo te estaremos notificando.');
            } else {
                return redirect('/registro-creado')->with('success', 'Registro guardado correctamente con el correo ' . $this->correoGeneral . '. Te hemos enviado un correo electrónico con la confirmación del mismo desde la cuenta eicari_siea@uaemex.mx. Si aun no has
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
