@extends('layouts.inner_general')

@section('content')
<section class="register_step_1">
         <div class="breadcrumb register_breadcrumb"><a href="JavaScript:;">Dashboard </a>/<span class="q_breadcrumb"> Quotes and questions</span></div>
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
                           <a class="nav-link active" data-toggle="tab" href="#Quotes">Quotes</a>
                        </li>
                        <li class="nav-item">
                           <a class="nav-link" data-toggle="tab" href="#Questions">Questions</a>
                        </li>
                     </ul>
                   </div>
                     <!-- Tab panes -->
                     <div class="tab-content">
                        <div class="tab-pane active" id="Quotes">
                            <div class="qq_main">
                            <form id="search_quotes" action="" method="POST">
                            <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">
                                 <div class="form-group custom_errow col-md-6 col-12">
                                    <label for="inputPassword4">Type</label>
                                    <select name="select_status" class="form-control " id="exampleSelect1" required>
                                      <option value="all" selected="">All</option>
                                      <option value="1" @if($quote_status == 1) selected @endif>New</option>
                                      <!-- <option value="2" @if($quote_status == 2) selected @endif>Read</option>
                                      <option value="3" @if($quote_status == 3) selected @endif>Quoted</option> -->
                                      <option value="4" @if($quote_status == 4) selected @endif>Accepted</option>
                                      <!-- <option value="5" @if($quote_status == 5) selected @endif>Rejected/Ignored</option> -->
                                    </select>
                                    <span class="select_arrow"><img src="{{ asset('img/custom_arrow.png') }}" class="img-fluid"></span>
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input type="text" class="form-control gen_quote_keyword" name="gen_quote_keyword" value="@if(!empty($quote_keyword)){{$quote_keyword}} @endif" id="inputPassword4">
                                 </div>
                              </div>
                              <div class="search_btn">
                                 <a href="javascript:;"><input type="submit" name="search_submt" value="Search"></a>
                              </div>
                           	</div>
                       		</form>
                           <div class="all_quote_section">

                           @foreach($quotes as $quote)

                           @php $acceptedSts = ''; @endphp
                            @php $newSts = ''; @endphp
                            @foreach($quote as $sQuote)
                              @if($sQuote['status']==4)
                                @php $acceptedSts = 1; @endphp
                              @endif
                              @if($sQuote['status']==1)
                                @php $newSts = 1; @endphp
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
                                    <h1>Quote id : {{$quote[0]['get_quotes']['quote_id']}}</h1>
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
                                      <div class="new_lable q_accepted_table">ACCEPTED</div>
                                      @elseif(isset($newSts) && $newSts==1)
                                      <div class="new_lable">NEW</div>
                                      @endif 
                                       <div class="created_date">{{$date}}</div>
                                    </div>
                                    <div class="quote_basic_detail">
                                       
                                       <div class="Q_detail">
                                          <span class="Q_detail_heading">Mobile Number:</span>
                                          <span>{{$quote[0]['get_quotes']['phone_number']}}</span>
                                       </div>
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
                                       <p>{{$quote[0]['get_quotes']['work_description']}}</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           @endforeach
                        
                          
                           </div>

                           <!-- <div class="loadMore"><a href="JavaScript:;">Load more</a></div> -->
                           <div class="ignored_proposals"><p>Ignored proposals</p></div>
                         </div>
                        <div class="ignore_p_section">
                          <div class="row">
                            @if(isset($quotes_ignored))
                              @if(!empty($quotes_ignored))
                                @foreach($quotes_ignored as $key=>$ignored_quote)
                                  <div class="col-lg-6 col-12">
                                    <div class="ignore_section">
                                      <div class="Q_tag">
                                             <div class="new_lable ignore_table">IGNORED</div>
                                      </div>
                                      <div class="content_image">
                                        <div class="userPic"><img src="{{ asset('img/user_placeholder.png') }}"/></div>
                                        <div class="contect_detail">
                                          <h1>{{ $ignored_quote['get_bus_user']['first_name']}} {{ $ignored_quote['get_bus_user']['last_name']}}</h1>
                                          <p><span>$ {{ $ignored_quote['quote_reply']['price_quotes']}}</span>  for everything</p>
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
                        <div class="tab-pane container fade" id="Questions">
                            <div class="qq_main">
                           <div class="search_filter">
                              <h1>Search filter</h1>
                              <div class="row  searchf_input">

                                 <div class="form-group col-md-6 col-12">
                                    <label for="inputPassword4">Keyword</label>
                                    <input type="text" class="form-control" id="inputPassword4" required="">
                                 </div>
                                 <div class="form-group col-md-6 col-12">
                                   <div class="search_btn for_search">
                                      <a href="javascript:;">Search</a>
                                   </div>
                                 </div>
                              </div>

                           </div>
                           <div class="quote_section">
                              <a href="question_review.html" class="new_quote">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                      <span>Replies <b>5</b></span>
                                      <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="created_date_for_mobile">
                                       <span class="c_time">17:40</span>
                                       <span class="c_date">14/07/2018</span>
                                    </div>
                                    <div class="Q_tag">
                                       <div class="new_lable">NEW</div>
                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote q_accepted">
                                 <div class="quote_detail">
                                    <h1>Home improvement quote</h1>
                                      <span>Replies <b>5</b></span>

                                    <div class="Q_tag">
                                       <div class="new_lable q_accepted_table">ANSWER</div>
                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
                                    </div>
                                 </div>
                              </a>
                           </div>
                           <div class="quote_section">
                              <a href="javascript:;" class="new_quote border-transparent">
                                 <div class="quote_detail">
                                    <h1>Car question</h1>
                                      <span>Replies <b>5</b></span>

                                    <div class="Q_tag">

                                       <div class="created_date"><span class="timedcreated">17:40</span><span class="timedcreated_d">14/07/2018</span></div>
                                    </div>

                                    <div class="Q_description">
                                       <p>Fusce vel ipsum a nisi sagittis fringilla in in odio. Aenean tempus at risus sit amet pulvinar. Mauris nec gravida eros, et dapibus est. Suspendisse eleifend imperdiet lectus vitae dignissim. Ut ornare sollicitudin lacus in tempus.</p>
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