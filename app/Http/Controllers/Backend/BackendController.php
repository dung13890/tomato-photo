<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use DB;
use Exception;
use Illuminate\Http\Response;
use Log;

abstract class BackendController extends AbstractController
{
    protected $guard = 'backend';

    protected $prefix = 'backend.';

    protected $view;

    protected $dataSelect = ['*'];

    protected $e = [
        'status' => true,
        'message' => null,
    ];

    protected function viewRender($data = [], $view = null)
    {
        $view = $view ?: $this->view;
        $compacts = array_merge($this->compacts, $data);

        return view($this->prefix . $view, $compacts);
    }

    protected function doRequest(callable $callback, $action, $message = false, $redirect = null)
    {
        DB::beginTransaction();
        try {
            $this->e['message'] = [__("repositories.actions.{$action}.successfully")];
            if (is_callable($callback)) {
                call_user_func_array($callback, []);
            }
            DB::commit();
        } catch (Exception $e) {
            $errorMessage = $e->getMessage();
            if (is_string($errorMessage)) {
                $errorMessage = [$e->getMessage()];
            }
            Log::info($errorMessage);
            DB::rollBack();
            $this->e['status'] = false;
            $this->e['message'] = $message ? $errorMessage : [__("repositories.actions.{$action}.unsuccessfully")];
        }
        if (\Request::ajax()) {
            return $this->e['status']
                ? response()->json($this->e)
                : response()->json($this->e, Response::HTTP_PAYMENT_REQUIRED);
        }
        $redirect = $redirect ?: route($this->prefix . $this->repositoryName . '.index');
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }

    public function __index()
    {
        $this->view = sprintf('%s.index', $this->repositoryName);
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.index");
    }

    public function __create()
    {
        $this->view = sprintf('%s.create', $this->repositoryName);
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.create");
    }

    public function __show($item)
    {
        $this->view = sprintf('%s.show', $this->repositoryName);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.show");
    }

    public function __edit($item)
    {
        $this->view = sprintf('%s.edit', $this->repositoryName);
        $this->compacts['item'] = $item;
        $this->compacts['heading'] = __("repositories.{$this->repositoryName}.resource.edit");
    }
}
