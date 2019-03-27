@extends('layouts.inner_business')

@section('content')

<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="{{ url('/business_user/business_dashboard') }}">Dashboard </a>/<span class="q_breadcrumb"> Quotes and questions</span></div>
      </section>
      <section>
         <div class="container">
            <div class="qq_main">
               <h1>Quotes and Questions</h1>
               <div class="questions_tabs_main">
                  <div class="quote_question">
                     <ul class="nav nav-tabs">
                        <li class="nav-item">
                           <a class="nav-link active" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane container active" id="Quotes">
                           <form id="search_quotes" action="" method="POST">
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
                              <a href="{{ url('/business_user/quotes_request/'.$quote_id) }}" class="new_quote">
                              @elseif($quote['status'] == 2)
                              <a href="{{ url('/business_user/quotes_request/'.$quote_id) }}" class="new_quote q_quoted">
                              @elseif($quote['status'] == 3)
                              <a href="{{ url('/business_user/quoted_accepted/'.$quote_id.'/3') }}" class="new_quote q_quoted">
                              @elseif($quote['status'] == 4)
                              <a href="{{ url('/business_user/quoted_accepted/'.$quote_id.'/4') }}" class="new_quote q_accepted">
                              @elseif($quote['status'] == 6)
                              <a href="{{ url('/business_user/quoted_accepted/'.$quote_id.'/6') }}" class="new_quote">
                              @else
                              <a href="" class="new_quote">
                              @endif
                              
                                 <div class="quote_detail">
                                    <h1>Quote id : {{$quote['get_quotes']['quote_id']}}</h1>
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
                        <div class="tab-pane container fade" id="Questions">
                           <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Status</label>
                                    <select class="form-control " id="exampleSelect1">
                                       <option>New and Answered</option>
                                       <option>2</option>
                                       <option>3</option>
                                       <option>4</option>
                                       <option>5</option>
                                    </select>
                                    <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input type="text" class="form-control" id="inputPassword4" required="">
                                 </div>
                              </div>
                              <div class="search_btn">
                                 <input type="submit" value="Search">
                              </div> 
                           </div>
                           <div class="quote_section">
                              <a href="question_detail.html" class="new_quote">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="Q_tag">
                                       <div class="new_lable">NEW</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date">14/07/2018</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">House type:</span>
                                          <span>Private land</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Required task:</span>
                                          <span>Design house</span>
                                       </div>
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Design type: </span>
                                          <span>Modern</span>
                                       </div>
                                    </div>
                                    <div class="Q_description">
                                       <p>Hello my name is Moshe and i'm looking for design of a new house</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="load_more"><a href="JavaScript:;">Load more</a></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

@endsection