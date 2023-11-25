<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>

<body>
    <!-- Main navigation container -->
    <nav class="relative flex w-full flex-wrap items-center justify-between bg-[#FBFBFB] py-2 text-neutral-500 shadow-lg  focus:text-neutral-700 dark:bg-neutral-600 lg:py-4"
        data-te-navbar-ref>
        <div class="flex w-full flex-wrap items-center justify-between px-3">
            <div>
                <a class=" my-1 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 lg:mb-0 lg:mt-0"
                    href="#">
                    <img class="" src="{{ asset('/image/logo1.png') }}" style="height: 40px" alt="TE Logo"
                        loading="lazy" />
                </a>
            </div>

            <!-- Hamburger button for mobile view -->


            <!-- Collapsible navbar container -->
            <div class="!visible mt-2 hidden flex-grow basis-[100%] items-center lg:mt-0 lg:!flex lg:basis-auto"
                id="navbarSupportedContent4" data-te-collapse-item>
                <!-- Left links -->
                <ul class="list-style-none mr-auto flex flex-col pl-0 lg:mt-1 lg:flex-row" data-te-navbar-nav-ref>
                    <!-- Home link -->
                    <li class="my-4 lg:my-0 lg:pl-2 lg:pr-1" data-te-nav-item-ref>
                        <a class="text-neutral-700 text-lg font-bold font disabled:text-black/30 hover:text-3xl dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:px-2 [&.active]:text-black/90 dark:[&.active]:text-neutral-400"
                            aria-current="page" href="#" data-te-nav-link-ref>Soran Uneversity</a>
                    </li>
                </ul>

                <div class="flex items-center px-2">

                    <a class="mr-4 hover:text-neutral-700" href="">Home</a>
                    <a class="mr-4 hover:text-neutral-700" href="">About</a>
                    @auth
                        <a class="mr-4 hover:text-neutral-700" href="{{ route('dashboard') }}">Dashboard</a>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <a class="mr-4 hover:text-neutral-700 " href="{{ route('register') }}">Register</a>
                        <a class="hover:text-neutral-700" href="{{ route('login') }}">{{ __('Login') }}</a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>
</body>

</html>




{{--

<h2 id="Table of Contents">Table of Contents</h2>
<p>&nbsp;</p>
<h2 id="Chapter One:">Chapter One:</h2>
<h4 id="Introduction">Introduction</h4>
<p>The usage of the internet has increased dramatically during the last 20 years. The<br>growth of huge open networks
    has resulted in a considerable increase in security risks. The<br>goal of network security is to secure commercial
    services like social media, financial<br>systems, and websites. Internet services are used in a wide range of
    applications, and many<br>daily chores, such as sales and banking, are conducted online. As a result, securing
    internet<br>services from hackers has become critical. Because there are numerous harmful threats that<br>may
    compromise a system in the absence of any secure apps offering security against such<br>threats, it is critical to
    pay attention to all online services. One such danger is the Bot, which<br>is a malicious software or computer
    automated program that may conduct automated tasks<br>via a network and hence cause network difficulties. In a
    network, there are numerous levels,<br>each with its own technique for defending against an attack. The Application
    Layer<br>Network is the most important layer in a network, and it is the focus of many network<br>assaults. Attacks
    on application layer networks are simple for an attacker to carry out since<br>they may be carried out by both
    manual and automated methods. Protecting the network in<br>the Application Layer Network will be an effective way to
    avoid attacks and keep the<br>network stable so that services may be provided. We look at the Application layer
    network,<br>which is a set of methods for defending against network assaults.<br>Hackers used to be highly
    proficient programmers who knew all there was to know about<br>computer communications and how to exploit flaws. By
    obtaining tools from the Internet,<br>practically anybody can now become a hacker. These sophisticated attack tools,
    together<br>with the prevalence of open networks, have raised the demand for dynamic security and<br>network
    security rules. Security Attack is any action that compromises the information security<br>owned by an organization
    using any process that is designed to detect it. Also, it refers to a process<br>whereby a user compromises a
    computer by installing grievous malicious software like adware,<br>2<br>viruses, spywares, and Trojan horses without
    your knowledge. This software often deletes certain<br>significant files on your computer, confuse functions of your
    computer, spy on your online surfing<br>behaviors, and cause advertisements to appear unexpectedly on your screen
    when you are online.<br>In recent years, the number of attacks against information systems has increased steadily in
    the<br>world. Moreover, previously unknown large-scale and dangerous attacks against the information<br>systems of
    companies have been observed, such as websites, banks, the public sector, and even the<br>military.<br>In recent
    years, a clear trend in the information security environment has emerged: online<br>applications are being targeted.
    Web applications remain a popular target for thieves, and<br>this trend shows no signs of slowing down; attackers
    are increasingly avoiding network<br>assaults in favor of cross-site scripting, SQL injection, and other
    application-layer<br>infiltration tactics. Poor input validity, insecure session management, disorganized
    by<br>specified system settings, and faults in operating systems and web server software are all<br>reasons for web
    application vulnerabilities. "Writing safe programs" is without a doubt the<br>most effective way for avoiding web
    application vulnerabilities. For starters, many firms<br>do not have the people or a sufficient budget to do
    complete code reviews in order to<br>discover flaws. Second, the drive to produce online apps as quickly as possible
    might lead<br>to mistakes and encourage less secure development approaches. Third, while web<br>application analysis
    software is improving, there is still a big percentage of the task that<br>must be done manually and is subject to
    human mistake. A defense-in-depth strategy to<br>securing an organization's online infrastructure is required, and
    involvement from many IT<br>departments, including web development, infrastructure, operations, and security,
    is<br>required. Many threats can prevent users from connecting to a network or accessing a web<br>resource.</p>
<h4 id="Security Attacks">Security Attacks</h4>
<p>Previously, hackers were overly skilled programmers who understood the details of<br>computer communications and how
    to exploit vulnerabilities. Nowadays almost anyone<br>can become a hacker by downloading tools from the Internet.
    These complex attack tools<br>and generally open networks have created an increased need for dynamic security
    and<br>network security policies.</p>
<h4 id="DoS">DoS</h4>
<p>Application layer denial of service (DoS) attacks are one of the most dangerous security<br>issues on the internet
    today. With the advancement of network and internet security, the<br>Dos attack has become the most prevalent
    assault in network security. The technologies<br>for detecting Dos attacks, such as network traffic detection and
    packet content detection,<br>are given. DoS attacks create service interruption by attempting to restrict access to
    a<br>computer or service rather than compromising the service itself. By focusing on either the<br>network's
    bandwidth or its connection, this type of attack seeks to render a network unable<br>to provide normal service.
    These assaults accomplish their purpose by bombarding a<br>victim's network or processing capacity with packets,
    limiting access to his usual<br>customers. The most common DoS attacks target the bandwidth or connection of
    a<br>computer network.</p>
<h4 id="DDoS">DDoS</h4>
<p>The term "Distributed Denial of Service" (DDoS) refers to an attack that attempts to make<br>internet services
    inaccessible to users. It generally briefly disrupts or suspends the functions<br>of its hosting server. DDoS
    assaults in a group, unlike a Denial-of-Service attack, may be<br>designed by an attacker. It is separated into a
    number of computers, each of which has a<br>legitimate IP but no legal users, making them zombie machines. During
    the assault, a large<br>amount of traffic is sent towards the servers, allowing them to get access to the website
    and<br>retrieve the data. A DDoS attack's main purpose is to inflict harm to a target, either for the<br>sake of
    fame or for personal reasons. The true attacker, handlers or masters, daemon agent<br>or zombie hosts, and victim or
    target hosts are the four aspects of a DDoS assault.<br>Security Property tries to clarify the types of threats that
    exist. First, it is necessary to define<br>the requirements for security. The most significant requirements for the
    security of every<br>network are to support the network based on the Confidentiality, Integrity and
    Availability<br>(CIA) model principle. This CIA triad is a simple but widely applicable security model,<br>and these
    three key principles should be guaranteed in any kind of secure system. These<br>principles are applicable across
    the entire subject of Security Analysis, from the access to<br>a user's internet history to security of encrypted
    data through the internet. Any case of<br>4<br>breaching any one of these principles can have serious consequences
    for the parties<br>concerned.</p>
<h4 id="The Aim">The Aim</h4>
<p>Our aim is to provide safe and secure web browsing and best experience while using the<br>aimed website and prevent
    any bots and illegitimate user agents to middle in the website<br>and put excessive amount of load on the web server
    and hurdle the user experience while<br>using the aimed website. In the end we want to provide a resalable service
    in concealed in<br>a package or opensource project so people and developer around the world could rely on<br>and use
    it to secure their website against illegitimate user agents. In another hand we want<br>internet to be a better
    place for real users and avoid them form spamming and bad<br>experience as well as making the web browsing faster
    and more trust worthy.<br>Furthermore, we don&rsquo;t want to disturb human users while looking for bad and
    illegitimate<br>users(bot)s therefore we would try to implement creative ways to identify bots and other<br>kind of
    illegal users form the service. We could achieve that by using Captcha and some<br>other types of security mechanism
    by doing so we make targeted website and any service<br>which our project is implemented more user friendly and
    secure at the same time.</p>
<h4 id="Problem Statement">Problem Statement</h4>
<p>Client&ndash;server network processing is used to provide access to Web content (Fig. 1). The<br>application-layer
    protocol HTTP (Hypertext Transfer Protocol) is used to communicate<br>between client and server software, which
    depends on the lower-level TCP/IP protocol<br>suite. A client is often a human-operated Web browser that visits
    successive pages of a<br>website; in such scenario, the browser generates a sequence of HTTP requests for
    each<br>single page: the initial request for a page description file and subsequent requests for<br>embedded
    objects. A client can alternatively be an artificial agent (bot), whose<br>communication with the server is
    unrestricted by the conventional website structure and is<br>purely dependent on the bot's implementation algorithm.
    In that case the artificial agent<br>(bot) can be quite harmful if it intended to be. The bot could fill up form
    that can lead up<br>to unsupervised and misguided data. Another case it can lead to much load on web server<br>if
    the bots have been deployed in a way to load too many pages at the same time which no<br>5<br>human user could
    partake. And many more bad activities that could harm server or human<br>user. Th process of loading a webpage or a
    website contains sires of activities but most<br>importantly it does not have capability to tell it its human or
    intelligent user.<br>The client sends a series of HTTP requests to the server across the Internet; the
    server<br>responds by using its resources and sending them back to the client. By generating many<br>processes or
    threads of execution in a single process, a Web server system can handle<br>multiple requests from multiple clients
    at the same time. The server is unaware of the client<br>type by default (legitimate user or both). Furthermore,
    because HTTP is a stateless<br>protocol, a user session on a website must be preserved using extra techniques such
    as<br>cookies. A basic server access log file records each request that comes into the server. Let's<br>look at an
    example server log entry in the NCSA Combined log format for a single HTTP<br>request:<br>- - - - - - - - - - - -
    [11/05/2015 04:48:29 +0200] [11/05/2015 04:48:29 +0200]<br>[11/05/2015 04:48:29 +0200] "GET /rob.txt HTTP/1.0" 200
    24660 "-" "GooglebotImage/1.0", "GET /rob.txt HTTP/1.0", "GET /rob.txt HTTP/1.0", "GET /rob.tx For such<br>request,
    the following fields can be distinguished:<br>&bull; 46.4.87.105 is the IP address of the client;<br>&bull; "- -":
    two optional parameters for authentication, which are not given here: a client<br>identification and a user
    identifier;<br>&bull; Data and time stamp of the request arrival: 11/May/2015:04:48:29 +0200;<br>&bull; GET: HTTP
    method (the most commonly used technique for downloading a server<br>resource);<br>&bull; /rob.txt: the requested
    resource's URI (Uniform Resource Identifier);<br>&bull; HTTP/1.0: a client-side version of the HTTP
    protocol;<br>&bull; 200: HTTP status code indicating the outcome of the server's request processing (200<br>denotes
    a successful request service);<br>&bull; 24660: the amount of data sent to the client in response (in bytes);</p>
<p>&bull; "-": a referrer (here not specified), which is the URL (Uniform Resource Locator) that<br>linked the client to
    a specific website for the initial request in the user session, and the<br>URL of the preceding page for subsequent
    requests;<br>&bull; User agent Googlebot-Image/1.0: describes the client software (here one can see that<br>the
    client was a Google bot for image indexing).<br>Ultimately a conventional web browser in client side can not
    recognize an<br>illegitimate(bot) user form real user(human) that might lead to major problems such as<br>server
    load in that, unusable data, rice of price in shopping bet websites, and many more<br>illegal use cases of bad
    behavioral by bots.</p>
<p>&nbsp;</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;"
        src="storage/images/iLyaDiu9YrTE9sspbq2rckq4RvPctD8hMYZ1YInf.png" alt="" width="706" height="397">
</p>
<h4 id="Proposed Solution">Proposed Solution</h4>
<p>Because a server log has a consistent structure, it's easy to extract specific request fields<br>from log entries and
    use them to reconstruct user sessions. A user session is a collection of<br>HTTP requests made by a client during a
    single website visit. A session can be defined<br>with many statistical aspects (attributes) based on the fields of
    requests, such as the total<br>number of requests, number of page requests, percentage of page requests, user
    uptime,<br>time interval, and so on. The formulation of problem is based on previous user agent<br>attributes, by
    extraction those attributes then analyze them and feed score algorithm those<br>statics so it can implement its
    criteria and add more suspicion of unusual statics of user<br>agents.</p>
<h4 id="Related Work">Related Work</h4>
<p>In this section, we'll look at latest research and prior work on the user behavioral model, as<br>well as approaches
    for distinguishing human users from automated programs (BOT) and<br>so defending the website from attack. For web
    browsing and web user behavior, several<br>statistical models have been developed, A website, for example, is viewed
    as an undirected<br>graph of pages in the Markov model, with the web user moving from one page to the
    next.<br>Beitollahi et al. have presented a user behavior model-based protection against application<br>layer denial
    of service threats. The major criteria used to predict user behavior were the<br>number of sessions, request rate
    per session, session duration, number of clicks per session,<br>mean time between two connections, favorite pages,
    page sequence order, and so on. The<br>behavior was modeled using a heuristic approach.<br>To model the behavior of
    consumers, some writers employed simulation tools. Blum, et al<br>suggested the Random Surfer as one of the tools
    for describing an online user's probabilistic<br>travel without taking into account the content of web sites. A
    surfer with a long body The<br>expanded version of the random surfer, Youming, et al, has a probability value and
    features<br>moving back, remaining on the page, and hopping to another page. Web use mining,<br>according to
    Srivastava et al. the use of data mining techniques to uncover patterns in Web<br>data in order to better understand
    the demands of Web-based applications. Clustering was<br>also utilized to group people who shared similar browsing
    habits and those who were<br>8<br>interested in pages with comparable content. Self-Organizing Features, for
    example, are a<br>clustering strategy. Maps have been used to organize user sessions and data that might lead<br>to
    a more accurate definition of online user behavior. A psychologically-based diffusion<br>model was used by Roman et
    al. to study user behavior. They discovered that artificially<br>generated page sequences are closer to 5% of the
    average number of visits to each page.<br>To detect zombie machines, Gavrilis et al. recommended using "Decoy
    Hyperlink." The<br>decoys are meaningless hyperlinks that are invisible to human users, working as DDoS<br>attack
    traps because no person would ever follow them. When you click on one of these<br>links, you'll be able to see
    whether there are any automated programs running. The authors<br>assume that an attacker scans and follows all
    hyperlinks on a page, however if an attacker<br>just follows a portion of the hyperlinks on a page, the fake
    hyperlinks are unlikely to be<br>chosen. Furthermore, because an attacker can solve CAPTCHAs using pattern
    recognition<br>techniques, he may detect fake URLs using comparable tools. When fake hyperlinks are<br>undetectable
    by human users, the attacker can simply create a tool to detect them. Xie and<br>Yu have presented a hidden
    semi-Markov model for detecting browsing anomalies. The<br>authors believe that regular users always visit sites in
    a sequential order based on hyperlink<br>structure, but attackers ignore this organization and go straight to random
    pages using their<br>URL. Following that, the authors use the entropy test to identify attackers. Even if the
    first<br>assumption is correct, the algorithm's second assumption is not necessarily correct. We<br>should point out
    that an attacker may easily create a program and instruct zombie<br>computers to follow sites based on hyperlink
    structure. In this instance, attackers' and<br>normal users' entropy values are similar, and the server is unable to
    recognize automated<br>applications. The method's algorithmic complexity is the method's second hurdle.</p>
<h2 id="Chapter Two:">Chapter Two:</h2>
<h4 id="Introduction">&nbsp;Introduction</h4>
<p>The main idea of user behavior model phase is to collect statistical data about the user<br>during normal conditions.
    Every user will be recognized based on behavior and recorded<br>data on the website. In this phase, the attributes
    which are defined for the system are used<br>to control the user activity and the data will be recorded for each
    user. These attributes and<br>data are website independent which means that any type of user, including human and
    bot,<br>cannot be aware of such statistical data. In fact, the user behavior model phase predicts the<br>legal
    connection with high probability in a feedback control process with the website. For<br>user behavior model, a score
    schema has been used to identify which type of user is online.<br>The score value during the page loading will be
    changed based on the defined attributes.<br>Each attribute may decrease the score value to decide whether the user
    is a human user or<br>not.&nbsp;</p>
<h4 id="Attributes">Attributes</h4>
<p>The website considers various attributes and statistical data for each user. In our study,<br>each attribute has a
    specific value, and each time when a user accesses a page on the<br>website, the website will predict a score value
    for each user. The initial score value for all<br>users when visiting the website for the first time will be 100
    and, based on user activity,<br>the score value will change according to the attributes that have been involved by
    the<br>system during website access. In the user behavior model phase, the threshold value used<br>to make the
    decision whether the user is a human or a bot is 50. The score value changes<br>during user activity on the website.
    If it is less than the threshold value the system sends<br>the user to the second phase, and if greater than the
    threshold value it allows the user to<br>access the website. For score value calculation in user behavior model
    phase some<br>requirements will be measured for each user. In this phase the system for each attribute<br>will
    measure its value based on their requirements. The requirements which are used for<br>all attributes in this phase
    are time, cookie, session, IP address and user status.<br>10<br>Time refers to the duration between a user opening
    one page and the next. Cookie is used<br>for tracking the user activity on the pages and for interaction between
    page sessions. With<br>IP address the system knows that the current user is either a new user or previously
    visited<br>the website. Finally, the user status determines the current page which is used by the user<br>and its
    activity.&nbsp;</p>
<h4 id="Page Time Interval">Page Time Interval</h4>
<p>We use time to measure total time spend by each user on the website. By calculating real<br>time and previous time
    the user visited the webpage then we compare both time span and<br>we get time spend by each user agent on the
    website and the time updates in real time. But<br>due to each computer or device capability which the web browser is
    running on we can&rsquo;t<br>be 100 % sure of its accuracy but about 90 % of accuracy or more</p>
<h4 id="Decoy Hyperlink">&nbsp;Decoy Hyperlink</h4>
<p>Decoys are hyperlinks that lack semantic information or are invisible to humans, operating<br>as traps for attackers
    and bots because a human would never follow them. When such a<br>hyperlink is followed, an attack on a web server is
    detected. the user agent becomes<br>increasingly suspicious each time the decoy hyper link is enabled.</p>
<p><img style="display: block; margin-left: auto; margin-right: auto;"
        src="storage/images/Vao3lHpsJ37lGga9BFOPa8S87klJE0UL4NfomQaq.png" alt="" width="766" height="431">
</p>
<h4 id="PHASE TWO CAPTCHA Mechanism Test:">PHASE TWO CAPTCHA Mechanism Test:</h4>
<p>After score reaches bellow 50, we send the user agent to verify if its human or not. We<br>don&rsquo;t want to block
    the user-agent right away because sometimes we might block a human<br>user instead a BOT or attacker. The Completely
    Automated Public Turing Test to Tell<br>Computers and Humans Apart (CAPTCHA) is an acronym for the Completely
    Automated<br>Public Turing Test to Tell Computers and Humans Apart. CAPTCHAs are technologies<br>that let you
    distinguish between human users and automated users like bots. CAPTCHAs<br>are challenges that are difficult for
    machines to complete but relatively simple for people<br>to complete. Identifying stretched characters or digits,
    for example, or clicking in a specific<br>spot. Maintaining poll accuracy&mdash;By verifying that each vote is input
    by a human,<br>CAPTCHAs can avoid poll skewing. While this does not limit the total number of votes<br>that can be
    cast, it does lengthen the time it takes to cast each vote, discouraging multiple<br>voting. Limiting service
    registration&mdash;CAPTCHAs can be used by services to prevent bots<br>from spamming registration systems and
    creating bogus accounts. Limiting account<br>creation saves a service's resources from being wasted and decreases
    the risk of fraud.<br>Ticket inflation can be avoided by using CAPTCHA in ticketing systems to prevent<br>scalpers
    from acquiring large quantities of tickets for resale. It can also be used to prevent<br>bogus free event
    registrations. Captchas can prevent bots from spamming message boards,<br>contact forms, and review sites by
    preventing bogus comments.<br>CAPTCHAs work by giving the user information to interpret. Traditional
    CAPTCHAs<br>required a user to submit distorted or overlapping characters and numbers via a form field.<br>The
    letters were distorted, making it impossible for bots to understand the content, and<br>access was restricted until
    the characters were validated. This sort of CAPTCHA relies on<br>a human's capacity to generalize and detect
    unfamiliar patterns based on a variety of<br>previous experiences. Bots, on the other hand, can frequently simply
    follow predetermined<br>patterns or enter randomized characters. Because of this constraint, bots are unlikely
    to<br>guess the correct combination correctly. Machine learning bots have been built since<br>CAPTCHA was
    introduced. With algorithms trained in pattern recognition, these bots are<br>better able to recognize classic
    CAPTCHAs.</p> --}}
