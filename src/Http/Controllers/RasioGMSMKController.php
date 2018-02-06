<?php namespace Bantenprov\RasioGMSMK\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\RasioGMSMK\Facades\RasioGMSMK;

/* Models */
use Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK\RasioGMSMK as PdrbModel;
use Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK\Province;
use Bantenprov\RasioGMSMK\Models\Bantenprov\RasioGMSMK\Regency;

/* etc */
use Validator;

/**
 * The RasioGMSMKController class.
 *
 * @package Bantenprov\RasioGMSMK
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class RasioGMSMKController extends Controller
{

    protected $province;

    protected $regency;

    protected $rasio-guru-murid-smk;

    public function __construct(Regency $regency, Province $province, PdrbModel $rasio-guru-murid-smk)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->rasio-guru-murid-smk     = $rasio-guru-murid-smk;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $rasio-guru-murid-smk = $this->rasio-guru-murid-smk->find($id);

        return response()->json([
            'negara'    => $rasio-guru-murid-smk->negara,
            'province'  => $rasio-guru-murid-smk->getProvince->name,
            'regencies' => $rasio-guru-murid-smk->getRegency->name,
            'tahun'     => $rasio-guru-murid-smk->tahun,
            'data'      => $rasio-guru-murid-smk->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->rasio-guru-murid-smk->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->rasio-guru-murid-smk->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

