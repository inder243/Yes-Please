@extends('layouts.inner_general')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="{{ url('/') }}">Home </a>/<span class="q_breadcrumb"> Quotes and questions</span></div>
      </section>
      <section>
         <div class="container-fluid">
                <div class="qq_main">
               <h1>Quotes and Questions</h1>
             </div>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                    <div class="qq_main">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link @if($tab == 'quotes')active @endif" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link @if($tab == 'ques')active @endif" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                   </div>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane @if($tab == 'quotes')active @endif" id="Quotes">
                            <div class="qq_main">
                            <form id="search_quotes" action="" method="POST">
                            <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Type</label>
                                    <select @if(isset($hide_sorting)) @if($hide_sorting == '1') disabled="" @endif @endif name="select_status" class="form-control " id="exampleSelect1" required>
                                      <option value="all" selected="">All</option>
                                      <option value="1" @if($quote_status == 1) selected @endif>New</option>
                                      <!-- <option value="2" @if($quote_status == 2) selected @endif>Read</option>
                                      <option value="3" @if($quote_status == 3) selected @endif>Quoted</option> -->
                                      <option value="4" @if($quote_status == 4) selected @endif>Accepted</option>
                                      <option value="6" @if($quote_status == 6) selected @endif>Completed</option>
                                      <!-- <option value="5" @if($quote_status == 5) selected @endif>Rejected/Ignored</option> -->
                                    </select>
                                    <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input @if(isset($hide_sorting)) @if($hide_sorting == '1') readonly="" @endif @endif type="text" class="form-control gen_quote_keyword" name="gen_quote_keyword" value="@if(!empty($quote_keyword)){{$quote_keyword}}@endif" id="inputPassword4">
                                 </div>
                              </div>
                              <div class="search_btn">
                                 <input @if(isset($hide_sorting)) @if($hide_sorting == '1') disabled="" @endif @endif type="submit" name="search_submt" value="Search" class="quotes_srch">
                              </div>
                           	</div>
                       		</form>
                           <div class="all_quote_section">
                            @if(!empty($quotes))
                            @foreach($quotes as $quote)

                              @php $acceptedSts = ''; @endphp
                              @php $newSts = ''; @endphp
                              @php $compltSts = ''; @endphp
                              
                              @foreach($quote as $sQuote)
                                @if($sQuote['status']==4)
                                  @php $acceptedSts = 1; @endphp
                                @endif
                                @if($sQuote['status']==1)
                                  @php $newSts = 1; @endphp
                                @endif
                                @if($sQuote['status']==6)
                                  @php $compltSts = 1; @endphp
                                @endif
                              @endforeach


                          <!--  <div class="quote_section" style="display:none;"> -->
                           <div class="quote_section">
                              <?php
                              $quote_id = $quote[0]['quote_id'];
                              ?>

                              @if(isset($acceptedSts) && $acceptedSts==1)
                              <a href="{{ url('/general_user/quoteaccepted/'.$quote_id) }}" class="new_quote q_accepted">
                              @elseif(isset($newSts) && $newSts==1)
                              <a href="{{ url('/general_user/quotesrply/'.$quote_id) }}" class="new_quote">
                              @elseif(isset($compltSts) && $compltSts==1)
                              <a href="{{ url('/general_user/quotecompleted/'.$quote_id) }}" class="new_quote">
                              @else
                              <a href="{{ url('/general_user/quotesrply/'.$quote_id) }}" class="new_quote">
                              @endif

                              <!-- @if($quote[0]['status'] == 1)
                              <a href="{{ url('/general_user/quotesrply/'.$quote_id) }}" class="new_quote">
                              @elseif($quote[0]['status'] == 2)
                              <a href="{{ url('/general_user/quotesrply/'.$quote_id) }}" class="new_quote q_quoted">
                              @elseif($quote[0]['status'] == 3)
                              <a href="{{ url('/general_user/quotesrply/'.$quote_id) }}" class="new_quote q_quoted">
                              @elseif($quote[0]['status'] == 4)
                              <a href="{{ url('/general_user/quoteaccepted/'.$quote_id) }}" class="new_quote q_accepted">
                                @elseif($quote[0]['status'] == 5)
                              <a href="{{ url('/general_user/quoteaccepted/'.$quote_id) }}" class="new_quote">
                              @else
                              <a href="" class="new_quote">
                              @endif -->
                              
                                 <div class="quote_detail">
                                    <!-- <h1>Quote id : {{$quote[0]['get_quotes']['quote_id']}}</h1> -->
                                    <h1>{{$quote[0]['get_quotes']['cat_name']}} Quotes : {{$quote[0]['get_quotes']['quote_id']}}</h1>
                                    <div class="created_date_for_mobile">

                                      <?php $datetime = $quote[0]['get_quotes']['created_at'];
                                        $splitTimeStamp = explode(" ",$datetime);
                                        // $date = $splitTimeStamp[0];
                                        // $time = $splitTimeStamp[1];
                                        $date = date('d/m/Y',strtotime($splitTimeStamp[0]));
                                        $time = date('H:i',strtotime($splitTimeStamp[1]));
                                      ?>

                                       <span class="c_time">{{$time}}</span>
                                       <span class="c_date">{{$date}}</span>
                                    </div>
                                    <div class="Q_tag">
                                      
                                      @if(isset($acceptedSts) && $acceptedSts==1)
                                      <div class="new_lable q_accepted_table gen_accepted">ACCEPTED</div>
                                      @elseif(isset($newSts) && $newSts==1)
                                      <div class="new_lable gen_new">NEW</div>
                                      @elseif(isset($compltSts) && $compltSts==1)
                                      <div class="new_lable gen_completed">Completed</div>
                                      @endif 
                                       <div class="created_date">{{$date}}</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                      @php $dynamic_formdata = json_decode($quote[0]['get_quotes']['dynamic_formdata'],true); @endphp

                                      @if(!empty($dynamic_formdata ))
                                      @foreach($dynamic_formdata as $dynami_key=>$dyanamic_values)
                                        @if($dyanamic_values['filter']==1)
                                        @if($dyanamic_values['type'] == 'textbox')
                                          @if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['value']))
                                          <div class="Q_detail">
                                            <span class="Q_detail_heading">{{$dyanamic_values['title']}} :</span>
                                            <span>{{$dyanamic_values['value']}}</span>
                                          </div>
                                          @endif
                                        @else

                                          @if(!empty($dyanamic_values['title']) && !empty($dyanamic_values['options']))
                                          <div class="Q_detail">
                                            <span class="Q_detail_heading">{{$dyanamic_values['title']}} :</span>

                                            @php $get_labels = ''; @endphp
                                            @foreach($dyanamic_values['options'] as $checkbox_data)
                                              @php $get_labels .= $checkbox_data['label'] . ','; @endphp
                                            @endforeach
                                            <span>{{$get_labels}}</span>
                                          </div>
                                          @endif
                                        @endif
                                        @endif
                                      @endforeach
                                      @endif

                                      @if(!empty($quote[0]['get_quotes']['phone_number']))
                                      <div class="Q_detail">
                                        <span class="Q_detail_heading">Mobile Number:</span>
                                        <span>{{$quote[0]['get_quotes']['phone_number']}}</span>
                                      </div>
                                      @endif
                                       <!-- <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div> -->
                                    </div>
                                    <div class="Q_description">
                                      @php $descriptn = mb_strimwidth($quote[0]['get_quotes']['work_description'], 0, 150, "..."); @endphp
                                       <p>{{$descriptn}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           @endforeach
                          @else
                          <div class="no_result_quotes">No Results Found!</div>
                          @endif
                          
                           </div>

                           <!-- <div class="loadMore"><a href="JavaScript:;">Load more</a></div> -->
                            @if(isset($quotes_ignored))
                              @if(!empty($quotes_ignored))
                                <div class="ignored_proposals"><p>Ignored proposals</p></div>
                              @endif
                            @endif
                            
                         </div>
                        <div class="ignore_p_section">
                          <div class="row">
                            @if(isset($quotes_ignored))
                              @if(!empty($quotes_ignored))
                                @foreach($quotes_ignored as $key=>$ignored_quote)
                                  <div class="col-lg-6 col-12">
                                    <div class="ignore_section">
                                      <div class="Q_tag">
                                             <div class="new_lable ignore_table gen_ignore">IGNORED</div>
                                      </div>
                                      <div class="content_image">
                                        <div class="userPic"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                                        
                                        <div class="contect_detail">
                                          <a href="{{ url('/general_user/quotesrequest/'.$ignored_quote['get_quotes']['id'].'/'.$ignored_quote['get_bus_user']['id'])}}"><h1>{{ $ignored_quote['get_bus_user']['business_name']}}, Quote id : {{ $ignored_quote['get_quotes']['quote_id']}}</h1></a>

                                          @php $details = mb_strimwidth($ignored_quote['quote_reply']['details'], 0, 30, "..."); @endphp

                                          @if($ignored_quote['quote_reply']['price_type'] == 2)
                                          @php $price_type = '/hour'; @endphp
                                          @else
                                          @php $price_type = ''; @endphp
                                          @endif

                                          <p><span>$ {{ $ignored_quote['quote_reply']['price_quotes'].$price_type}}</span>for {{$details}}</p>
                                        </div>
                                      
                                      </div>
                                    </div>
                                  </div>
                                @endforeach
                              @endif
                            @endif
                            
                          </div>
                        </div>
                        </div>
                        <div class="tab-pane container @if($tab == 'ques')active @else fade @endif" id="Questions">
                            <div class="qq_main">
                              <form method="POST" name="ques_keyword_form" id="search_questions" action="">
                                <div class="search_filter">
                                  <h1>Search filter</h1>
                                  <div class="row  searchf_input">

                                    <div class="form-group col-md-6 col-12">
                                      <label for="inputPassword4">Keyword</label>
                                      <input type="text" class="form-control gen_ques_keyword" id="inputPassword4" value="@if(!empty($ques_keyword)){{$ques_keyword}}@endif">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                      <div class="search_btn for_search">
                                        <input type="submit" value="Search" class="question_srch">
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </form>

                          @if(!empty($questions))
                            @foreach($questions as $all_qus)
                            <div class="quote_section">

                              @php $question_id = $all_qus[0]['question_id']; @endphp

                              @php $answerdSts = ''; @endphp
                              @php $newSts = ''; @endphp
                              @php $readSts = ''; @endphp
                              
                              @foreach($all_qus as $sQuote)
                                @if($sQuote['get_ques']['status_gen']==3)
                                  @php $answerdSts = 1; @endphp
                                @endif
                                @if($sQuote['get_ques']['status_gen']==2)
                                  @php $readSts = 1; @endphp
                                @endif
                                @if($sQuote['get_ques']['status_gen']==1)
                                  @php $newSts = 1; @endphp
                                @endif
                              @endforeach

                              @if(isset($answerdSts) && $answerdSts==1)
                              <a href="{{ url('/general_user/qusreply/'.$question_id) }}" class="new_quote q_accepted">
                              @elseif(isset($readSts) && $readSts==1)
                              <a href="{{ url('/general_user/qusreply/'.$question_id) }}" class="new_quote q_quoted">
                              @elseif(isset($newSts) && $newSts==1)
                              <a href="{{ url('/general_user/qusreply/'.$question_id) }}" class="new_quote">
                              @else
                              <a href="{{ url('/general_user/qusreply/'.$question_id) }}" class="new_quote">
                              @endif

                                   <div class="quote_detail">
                                      <h1>{{$all_qus[0]['get_ques']['cat_name']}} Question</h1>

                                      <?php
                                        $get_total_replies = DB::table('yp_business_users_questions')->where(['question_id'=>$all_qus[0]['question_id'],'general_id'=>$all_qus[0]['general_id']])->where('business_answer','!=','')->count('business_answer');
                                      ?>
                                        <span>Replies <b>{{$get_total_replies}}</b></span>
                                        <?php $datetim = $all_qus[0]['get_ques']['created_at'];
                                          $splitTimeStmp = explode(" ",$datetim);
                                          
                                          $date = date('d/m/Y',strtotime($splitTimeStmp[0]));
                                          $time = date('H:i',strtotime($splitTimeStmp[1]));
                                        ?>
                                        <div class="created_date_for_mobile">
                                           <span class="c_time">{{$time}}</span>
                                           <span class="c_date">{{$date}}</span>
                                        </div>
                                        <div class="created_date_for_mobile">
                                           <span class="c_time">{{$time}}</span>
                                           <span class="c_date">{{$date}}</span>
                                        </div>
                                        <div class="Q_tag">
                                          @if(isset($answerdSts) && $answerdSts==1)
                                          <div class="new_lable q_accepted_table gen_accepted">ANSWERED</div>
                                          @elseif(isset($readSts) && $readSts==1)
                                          <div class="new_lable q_quoted_table gen_read">READ</div>
                                          @elseif(isset($newSts) && $newSts==1)
                                          <div class="new_lable gen_new">NEW</div>
                                          @endif 

                                           <div class="created_date"><span class="timedcreated">{{$time}}</span><span class="timedcreated_d">{{$date}}</span></div>
                                      </div>

                                      <div class="Q_description">
                                        @php $q_descriptn = mb_strimwidth($all_qus[0]['get_ques']['q_title'], 0, 150, "..."); @endphp
                                         <p>{{$q_descriptn}}</p>
                                      </div>
                                   </div>
                                </a>
                             </div>
                             @endforeach
                            @else
                            <div class="no_result_quotes">No Results Found!</div>
                            @endif
                           
                           <!-- <div class="load_more"><a href="JavaScript:;">Load more</a></div> -->
                        </div>
                        </div>
                     </div>
                  </div>
               </div>

         </div>
      </section>

@endsection