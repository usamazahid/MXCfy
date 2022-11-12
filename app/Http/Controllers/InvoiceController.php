<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Utility;
use App\Models\Store;
use Illuminate\Http\Request;
use Auth;

class InvoiceController extends Controller
{

     public function __construct()
    {
        if(\Auth::check())
        {
             \App::setLocale(\Auth::user()->lang);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'super admin') {
            $Invoices = Invoice::with(['stores'])->orderBy('id', 'DESC')->all();
        } else {
            $user  = \Auth::user();
            $store = Store::where('id', $user->current_store)->first();

            $Invoices = Invoice::with(['stores'])->orderBy('id', 'DESC')->where('store_id', $store->id)->get();
        }
        return view('invoice.index', compact('Invoices'));
    }

    public function change_status($id)
    {
        if (Auth::user()->type == 'super admin') {
            $Invoice = Invoice::find($id);
            $Invoice->is_paid = ($Invoice->is_paid) ? '0' : '1';
            $Invoice->save();
        }
        return redirect()->route('invoice');
    }


    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('invoice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usr = \Auth::user();

        $validator = \Validator::make(
            $request->all(), [
                               'name' => 'required',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $Invoice             = new Invoice();
        $Invoice->name       = $request->name;
        $Invoice->created_by = $usr->id;
        $Invoice->save();

        return redirect()->route('email_template.index')->with('success', __('Email Template successfully created.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Invoice $emailTemplate
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        return redirect()->back()->with('error', 'Permission denied.');
    }
    public function view()
    {

        // return redirect()->back()->with('error', 'Permission denied.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Invoice $emailTemplate
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $emailTemplate)
    {
        return redirect()->back()->with('error', 'Permission denied.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Invoice $emailTemplate
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $emailTemplate)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'from' => 'required',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $emailTemplate       = Invoice::find($emailTemplate->id);
        $emailTemplate->from = $request->from;
        $emailTemplate->save();

        return redirect()->route(
            'manage.email.language', [
                                       $emailTemplate->id,
                                       $request->lang,
                                   ]
        )->with('success', __('Email Template successfully updated.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Invoice $emailTemplate
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $emailTemplate)
    {
        return redirect()->back()->with('error', __('This operation is not perform due to demo mode.'));

        return redirect()->back()->with('error', 'Permission denied.');
    }

    // Used For View Email Template Language Wise
    public function emailTemplate($lang = 'en')
    {
        // $usr = \Auth::user();
        $languages         = Utility::languages();
        $emailTemplate     = Invoice::first();

        $currEmailTempLang = InvoiceLang::where('parent_id', '=', $emailTemplate->id)->where('lang', $lang)->first();

        if(!isset($currEmailTempLang) || empty($currEmailTempLang))
        {
            $currEmailTempLang       = InvoiceLang::where('parent_id', '=', $emailTemplate->id)->where('lang', 'en')->first();
            $currEmailTempLang->lang = $lang;

        }

        $Invoices = Invoice::all();
        // dd($Invoices);

        return view('invoice.show', compact('emailTemplate', 'languages', 'currEmailTempLang','lang','Invoices'));
    }

    public function manageEmailLang($id, $lang = 'en')
    {

        $languages         = Utility::languages();
        $emailTemplate     = Invoice::where('id', '=', $id)->first();
        $currEmailTempLang = InvoiceLang::where('parent_id', '=', $id)->where('lang', $lang)->first();

        if(!isset($currEmailTempLang) || empty($currEmailTempLang))
        {
            $currEmailTempLang       = InvoiceLang::where('parent_id', '=', $id)->where('lang', 'en')->first();

            $currEmailTempLang->lang = $lang;
        }
        $Invoices = Invoice::all();
        return view('invoice.show', compact('emailTemplate', 'languages', 'currEmailTempLang','Invoices'));
    }

    public function updateEmailSettings(Request $request,$id){

        $validator = \Validator::make(
            $request->all(), [
                               'from' => 'required',
                               'subject' => 'required',
                               'content' => 'required',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();

            return redirect()->back()->with('error', $messages->first());
        }

        $emailTemplate       = Invoice::where('id',$id)->first();
        $emailTemplate->from = $request->from;
        $emailTemplate->save();

        $emailLangTemplate = InvoiceLang::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first();

        // if record not found then create new record else update it.
        if(empty($emailLangTemplate))
        {
            $emailLangTemplate            = new InvoiceLang();
            $emailLangTemplate->parent_id = $id;
            $emailLangTemplate->lang      = $request['lang'];
            $emailLangTemplate->subject   = $request['subject'];
            $emailLangTemplate->content   = $request['content'];
            $emailLangTemplate->save();
        }
        else
        {
            $emailLangTemplate->subject = $request['subject'];
            $emailLangTemplate->content = $request['content'];
            $emailLangTemplate->save();
        }

        return redirect()->route(
            'manage.email.language', [
                                       $emailTemplate->id,
                                       $request->lang,
                                   ]
        )->with('success', __('Email Template successfully updated.'));
    }

    // Used For Store Email Template Language Wise
    public function storeEmailLang(Request $request, $id)
    {
        $validator = \Validator::make(
            $request->all(), [
                               'subject' => 'required',
                               'content' => 'required',
                           ]
        );

        if($validator->fails())
        {
            $messages = $validator->getMessageBag();
            return redirect()->back()->with('error', $messages->first());
        }

        $emailLangTemplate = InvoiceLang::where('parent_id', '=', $id)->where('lang', '=', $request->lang)->first();

        // if record not found then create new record else update it.
        if(empty($emailLangTemplate))
        {
            $emailLangTemplate            = new InvoiceLang();
            $emailLangTemplate->parent_id = $id;
            $emailLangTemplate->lang      = $request['lang'];
            $emailLangTemplate->subject   = $request['subject'];
            $emailLangTemplate->content   = $request['content'];
            $emailLangTemplate->save();
        }
        else
        {
            $emailLangTemplate->subject = $request['subject'];
            $emailLangTemplate->content = $request['content'];
            $emailLangTemplate->save();
        }

        return redirect()->route(
            'manage.email.language', [
                                       $id,
                                       $request->lang,
                                   ]
        )->with('success', __('Email Template Detail successfully updated.'));

    }

    // Used For Update Status Company Wise.
    public function updateStatus(Request $request, $id)
    {
        $usr = \Auth::user();

        $user_email = UserInvoice::where('id', '=', $id)->where('user_id', '=', $usr->id)->first();
        if(!empty($user_email))
        {
            if($request->status == 1)
            {
                $user_email->is_active = 0;
            }
            else
            {
                $user_email->is_active = 1;
            }

            $user_email->save();

            return response()->json(
                [
                    'is_success' => true,
                    'success' => __('Status successfully updated!'),
                ], 200
            );
        }
    }
}
