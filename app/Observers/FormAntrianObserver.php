<?php

namespace App\Observers;

use Illuminate\Support\Facades\Auth;
use Modules\FormAntrian\Models\FormAntrian;

class FormAntrianObserver
{
    /**
     * Handle the FormAntrian "created" event.
     *
     * @param  \Modules\FormAntrian\Models\FormAntrian  $formAntrian
     * @return void
     */
    public function created(FormAntrian $formAntrian)
    {
        //
    }

    /**
     * Handle the FormAntrian "updated" event.
     *
     * @param  \Modules\FormAntrian\Models\FormAntrian  $formAntrian
     * @return void
     */
    public function updated(FormAntrian $formAntrian)
    {
        $formAntrian->updated_by = Auth::user()->id;
    }

    /**
     * Handle the FormAntrian "deleted" event.
     *
     * @param  \Modules\FormAntrian\Models\FormAntrian  $formAntrian
     * @return void
     */
    public function deleted(FormAntrian $formAntrian)
    {
        //
    }

    /**
     * Handle the FormAntrian "restored" event.
     *
     * @param  \Modules\FormAntrian\Models\FormAntrian  $formAntrian
     * @return void
     */
    public function restored(FormAntrian $formAntrian)
    {
        //
    }

    /**
     * Handle the FormAntrian "force deleted" event.
     *
     * @param  \Modules\FormAntrian\Models\FormAntrian  $formAntrian
     * @return void
     */
    public function forceDeleted(FormAntrian $formAntrian)
    {
        //
    }
}
