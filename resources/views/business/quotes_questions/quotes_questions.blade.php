@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">

         <div class="breadcrumb register_breadcrumb"><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/@if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))<a href="{{ url('/business_user/advertisement_dashboard') }}"> Advertisement </a>/@endif<span class="q_breadcrumb"> Quotes and questions</span></div>

      </section>
      <section>
         <div class="container">
            <div class="qq_main">
               <h1>Quotes and Questions</h1>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                     <ul class="nav nav-tabs">
                        <li class="nav-item quotes_li">
                           <a class="nav-link quotes_tabb @if($tab == 'quotes')active @endif" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item question_li">
                           <a class="nav-link question_tabb @if($tab == 'ques')active @endif" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane container @if($tab == 'quotes')active @endif" id="Quotes">
                           <form id="bus_search_quotes" action="" method="POST">
                              <div class="search_filter">
                                 <h1>Search filter</h1>
                                 <div class="row searchf_input">
                                    <div class="form-group custom_errow col-md-6 col-12">
                                       <label for="inputPassword4">Status</label>
                                       <select @if(isset($hide_sorting)) @if($hide_sorting == '1') disabled="" @endif @endif name="select_status" class="form-control" id="exampleSelect1" required>
                                          <option value="all" selected="">All</option>
                                          <option value="1" @if($quote_status == 1) selected @endif>New</option>
                                          <option value="2" @if($quote_status == 2) selected @endif>Read</option>
                                          <option value="3" @if($quote_status == 3) selected @endif>Quoted</option>
                                          <option value="4" @if($quote_status == 4) selected @endif>Accepted</option>
                                          <option value="5" @if($quote_status == 5) selected @endif>Rejected/Ignored</option>
                                          <option value="6" @if($quote_status == 6) selected @endif>Completed</option>
                                       </select>
                                       <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label for="inputPassword4">Keyword</label>
                                       <input @if(isset($hide_sorting)) @if($hide_sorting == '1') readonly="" @endif @endif type="text" class="form-control bus_quote_keyword" name="bus_quote_keyword" value="@if(!empty($quote_keyword)){{$quote_keyword}} @endif" id="inputPassword4">
                                    </div>
                                 </div>
                                 <div class="search_btn">
                                    <input @if(isset($hide_sorting)) @if($hide_sorting == '1') disabled="" @endif @endif type="submit" name="search_submt" value="Search">
                                 </div>
                              </div>
                           </form>
                           <div class="all_quote_section">
                           @if(!empty($quotes))
                           @foreach($quotes as $quote)
                           <!-- <div class="quote_section" style="display:none;"> -->
                           <div class="quote_section">
                              <?php
                              $quote_id = $quote['quote_id'];
                              ?>
                              @if($quote['status'] == 1)
                                 @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                                 <a href="{{ url('/business_user/quotes_request?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id) }}" class="new_quote">
                                 @else
                                 <a href="{{ url('/business_user/quotes_request?quote_id='.$quote_id) }}" class="new_quote">
                                 @endif
                              @elseif($quote['status'] == 2)
                                 @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                                 <a href="{{ url('/business_user/quotes_request?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id) }}" class="new_quote q_quoted">
                                 @else
                                 <a href="{{ url('/business_user/quotes_request?quote_id='.$quote_id) }}" class="new_quote q_quoted">
                                 @endif
                              
                              @elseif($quote['status'] == 3)
                                 @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                                 <a href="{{ url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=3') }}" class="new_quote q_quoted">
                                 @else
                                 <a href="{{ url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=3') }}" class="new_quote q_quoted">
                                 @endif
                             
                              @elseif($quote['status'] == 4)
                                 @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                                 <a href="{{ url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=4') }}" class="new_quote q_accepted">
                                 @else
                                 <a href="{{ url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=4') }}" class="new_quote q_accepted">
                                 @endif
                             
                              @elseif($quote['status'] == 6)
                                 @if(!empty(app('request')->input('month'))  && !empty(app('request')->input('type')))
                                 <a href="{{ url('/business_user/quoted_accepted?month='.app('request')->input('month').'&type='.app('request')->input('type').'&quote_id='.$quote_id.'&quote_status=6') }}" class="new_quote">
                                 @else
                                 <a href="{{ url('/business_user/quoted_accepted?quote_id='.$quote_id.'&quote_status=6') }}" class="new_quote">
                                 @endif
                              @else
                              <a href="" class="new_quote">
                              @endif
                              
                                 <div class="quote_detail">

                                    <h1>{{$quote['get_quotes']['cat_name']}} Quotes : {{$quote['get_quotes']['quote_id']}}</h1>
                                    <div class="created_date_for_mobile">
                                       <?php $datetime = $quote['get_quotes']['created_at'];
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
                                       @if($quote['status'] == 1)
                                       <div class="new_lable bus_new">NEW</div>
                                       @elseif($quote['status'] == 2)
                                       <div class="new_lable q_quoted_table bus_read">READ</div>
                                       @elseif($quote['status'] == 3)
                                       <div class="new_lable q_quoted_table bus_quoted">QUOTED</div>
                                       @elseif($quote['status'] == 4)
                                       <div class="new_lable q_accepted_table bus_accepted">ACCEPTED</div>
                                       @elseif($quote['status'] == 5)
                                       <div class="new_lable bus_rejected">REJECTED</div>
                                       @else
                                       <div class="new_lable bus_completed">Completed</div>
                                       @endif
                                       <div class="created_date">{{$date}}</div>
                                    </div>
                                    <div class="quote_basic_detail">

                                       @php $dynamic_formdata = json_decode($quote['get_quotes']['dynamic_formdata'],true); @endphp

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

                                       
                                       @if(!empty($quote['get_quotes']['phone_number']))
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Mobile Number:</span>
                                          <span>{{$quote['get_quotes']['phone_number']}}</span>
                                       </div>
                                       @endif

                                    </div>
                                    <div class="Q_description">
                                       @php $descriptn = mb_strimwidth($quote['get_quotes']['work_description'], 0, 150, "..."); @endphp
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
                           <!-- <div class="load_more"><a href="JavaScript:;">Load more</a></div> -->
                        </div>
                        <div class="tab-pane container  @if($tab == 'ques')active @else fade @endif" id="Questions">
                           <form method="POST" name="ques_keyword_form" id="bus_search_questions" action="">
                              <div class="search_filter">
                                 <h1>Search filter</h1>
                                 <div class="row  searchf_input">
                                    <div class="form-group custom_errow col-md-6 col-12">
                                       <label for="inputPassword4">Status</label>
                                       <select class="form-control" id="exampleSelect1">
                                          <option value="all" @if($ques_status == 'all') selected @endif>All</option>
                                          <option value="1" @if($ques_status == 1) selected @endif>New</option>
                                          <option value="2" @if($ques_status == 2) selected @endif>Read</option>
                                          <option value="2" @if($ques_status == 3) selected @endif>Answered</option>
                                       </select>
                                       <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                       <label for="inputPassword4">Keyword</label>
                                       <input type="text" class="form-control bus_ques_keyword" value="@if(!empty($ques_keyword)){{$ques_keyword}}@endif" id="inputPassword4">
                                    </div>
                                 </div>
                                 <div class="search_btn">
                                    <input type="submit" value="Search">
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
                                    @if($sQuote['status_bus']==3)
                                       @php $answerdSts = 1; @endphp
                                    @endif
                                    @if($sQuote['status_bus']==1)
                                       @php $newSts = 1; @endphp
                                    @endif
                                    @if($sQuote['status_bus']==2)
                                       @php $readSts = 1; @endphp
                                    @endif
                                 @endforeach

                                 @if(isset($answerdSts) && $answerdSts==1)
                                 <a href="{{ url('/business_user/question_detail/'.$question_id) }}" class="new_quote q_accepted">
                                 @elseif(isset($readSts) && $readSts==1)
                                 <a href="{{ url('/business_user/question_detail/'.$question_id) }}" class="new_quote q_quoted">
                                 @elseif(isset($newSts) && $newSts==1)
                                 <a href="{{ url('/business_user/question_detail/'.$question_id) }}" class="new_quote">
                                 @else
                                 <a href="{{ url('/business_user/question_detail/'.$question_id) }}" class="new_quote">
                                 @endif
                                    <div class="quote_detail">
                                       <h1>{{$all_qus[0]['get_ques']['cat_name']}} Question</h1>
                                       <?php $datetim = $all_qus[0]['get_ques']['created_at'];
                                          $splitTimeStmp = explode(" ",$datetim);
                                           
                                          $date = date('d/m/Y',strtotime($splitTimeStmp[0]));
                                          $time = date('H:i',strtotime($splitTimeStmp[1]));
                                         ?>
                                       <div class="created_date_for_mobile">
                                          <span class="c_time">{{$time}}</span>
                                          <span class="c_date">{{$date}}</span>
                                       </div>
                                       <div class="Q_tag">
                                          @if(isset($answerdSts) && $answerdSts==1)
                                           <div class="new_lable q_accepted_table gen_accepted">ANSWER</div>
                                           @elseif(isset($readSts) && $readSts==1)
                                           <div class="new_lable q_quoted_table gen_read">READ</div>
                                           @elseif(isset($newSts) && $newSts==1)
                                           <div class="new_lable gen_new">NEW</div>
                                           @endif
                                           
                                          <div class="created_date">{{$date}}</div>
                                       </div>
                                       <div class="quote_basic_detail">
                                          <div class="Q_detail">
                                             <span class="Q_detail_heading1">Question : </span>
                                             <span>{{$all_qus[0]['get_ques']['q_title']}}</span>
                                          </div>
                                       </div>
                                       <div class="Q_description">
                                          @php $q_descriptn = mb_strimwidth($all_qus[0]['get_ques']['q_description'], 0, 150, "..."); @endphp
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