<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use Auth;

class SearchController extends Controller{
    public function index(){
        return view('search.search');
    }
    public function search(Request $request)
    {
        if($request->ajax()){
            $output="";
            $user_id = Auth::user()->id;
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.number','LIKE','%'.$request->search."%")
            ->where('threads.brand', '=', $request->brand)
            ->get();
            if($stash){
                foreach ($stash as $key => $thread) {
                    $output.='<tr>'.
                    '<td style="background-color:#'.$thread->hex.'"></td>'.
                    '<td>'.$thread->number.'</td>'.
                    '<td>'.$thread->brand.'</td>'.
                    '<td class="row_skein"><input type="text" style="max-width:70px;text-align:center" name="skein" value="'.$thread->skein.'"/></td>'.
                    '<td class="row_bobbin"><input type="text" style="max-width:70px;text-align:center" name="bobbin" value="'.$thread->bobbin.'"/></td>'.
                    '<td class="row_partial"><input type="text" style="max-width:70px;text-align:center" name="partial" value="'.$thread->partial.'"/></td>'.
                    '<td class="row_need"><input type="text" style="max-width:70px;text-align:center" name="need" value="'.$thread->need.'"/></td>'.
                    '<td><button type="button" class="update_stash btn btn-primary" 
                    data-id="'.$thread->stash_id.'" 
                    data-skein="'.$thread->skein.'"
                    data-bobbin="'.$thread->bobbin.'"
                    data-partial="'.$thread->partial.'"
                    data-need="'.$thread->need.'"
                    >Save</button></td>'. 
                    '</tr>';
                }
                return Response($output);
            }
        }
    }

    public function categorysearch(Request $request)
    {
        if($request->ajax()){
            $output="";
            $user_id = Auth::user()->id;
            $stash = DB::table('stashes')
            ->select('*')
            ->join('threads', 'threads.id', '=', 'stashes.thread_id')
            ->where('stashes.user_id', $user_id)
            ->where('threads.category','=',$request->search)
            ->where('threads.brand', '=', $request->brand)
            ->get();
            if($stash){
                foreach ($stash as $key => $thread) {
                    $output.='<tr>'.
                    '<td style="background-color:#'.$thread->hex.'"></td>'.
                    '<td>'.$thread->number.'</td>'.
                    '<td>'.$thread->brand.'</td>'.
                    '<td class="row_skein"><input type="text" style="max-width:70px;text-align:center" name="skein" value="'.$thread->skein.'"/></td>'.
                    '<td class="row_bobbin"><input type="text" style="max-width:70px;text-align:center" name="bobbin" value="'.$thread->bobbin.'"/></td>'.
                    '<td class="row_partial"><input type="text" style="max-width:70px;text-align:center" name="partial" value="'.$thread->partial.'"/></td>'.
                    '<td class="row_need"><input type="text" style="max-width:70px;text-align:center" name="need" value="'.$thread->need.'"/></td>'.
                    '<td><button type="button" class="update_stash btn btn-primary" 
                    data-id="'.$thread->stash_id.'" 
                    data-skein="'.$thread->skein.'"
                    data-bobbin="'.$thread->bobbin.'"
                    data-partial="'.$thread->partial.'"
                    data-need="'.$thread->need.'"
                    >Save</button></td>'. 
                    '</tr>';
                }
                return Response($output);
            }
        }
    }
}