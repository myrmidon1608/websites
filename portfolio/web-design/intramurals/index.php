<?php $title= "| Home";
$desc= "The Intramural Sports &amp; REC Center homepage provides all information for the Intramural and Club Sports programs on campus, as well as the PEC, TW Fitness, and Aquatic Center facilities. Any overall deparment updates can be found on this page.";
include ('top.php'); ?>

		<div class="twitter"><script src="http://widgets.twimg.com/j/2/widget.js"></script>
		<script>
        new TWTR.Widget({
          version: 2,
          type: 'profile',
          rpp: 3,
          interval: 30000,
          width: 210,
          height: 400,
          theme: {
            shell: {
              background: '#293f6f',
              color: '#ffffff'
            },
            tweets: {
              background: '#ffffff',
              color: '#000000',
              links: '#a67a00'
            }
          },
          features: {
            scrollbar: false,
            loop: false,
            live: false,
            behavior: 'all'
          }
        }).render().setUser('tcnjintramural').start();
        </script></div>

		<div class="blog">
        	<ul>
            	<li>
                <div class="headline"><a href="#">This Would Be A Blog Update</a></div>
                <p class="date">XX/XX/XXXX</p>
        		<div>Bacon ipsum dolor sit amet shank hamburger biltong ham hock strip steak beef tri-tip. Kielbasa dolor boudin, shank ball tip cillum biltong prosciutto short ribs ham. Minim corned beef excepteur flank andouille cow do. In pork chop incididunt chuck capicola. Velit short ribs duis est, nulla pariatur ball tip fugiat adipisicing eu in leberkas shoulder salami fatback.</div>
                </li>
                <li>
                <div class="headline"><a href="#">Another Update</a></div>
                <p class="date">XX/XX/XXXX</p>
        		<img src="pictures/ffb02.jpg" alt="" />
                <div>Bacon ipsum dolor sit amet chicken bacon tail kielbasa. In salami bacon rump, non minim strip steak pig pancetta. Et anim eu esse consequat. Pariatur sed rump short loin ham duis incididunt jerky salami brisket shank exercitation. Ullamco pork chop veniam tempor shoulder. Biltong deserunt laborum dolor est reprehenderit. Corned beef id dolore, kielbasa turkey boudin do ut shoulder ball tip et chicken cow qui.<br /><br /></div>
                </li>
            </ul>
        </div>
        
<?php include ('bottom.php'); ?>
