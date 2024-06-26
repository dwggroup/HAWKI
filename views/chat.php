<?php session_start(); ?>

<div class="limitations">
	 <div>
		 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		 <path d="M22 11.08V12C21.9988 14.1564 21.3005 16.2547 20.0093 17.9818C18.7182 19.709 16.9033 20.9725 14.8354 21.5839C12.7674 22.1953 10.5573 22.1219 8.53447 21.3746C6.51168 20.6273 4.78465 19.2461 3.61096 17.4371C2.43727 15.628 1.87979 13.4881 2.02168 11.3363C2.16356 9.18455 2.99721 7.13631 4.39828 5.49706C5.79935 3.85781 7.69279 2.71537 9.79619 2.24013C11.8996 1.7649 14.1003 1.98232 16.07 2.85999" stroke="#06B044" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		 <path d="M22 4L12 14.01L9 11.01" stroke="#06B044" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		 </svg>
		 <h2>Möglichkeiten</h2>
		 <div>
			 <div class="limitation-item">
				 <strong>Kontextverständnis</strong> - Merkt sich, was vorab in der Konversation gesagt wurde.
			 </div>
			 <div class="limitation-item">
				 <strong>Iteration</strong> - Erlaubt nachträgliche Korrekturen generierter Ergebnisse.
			 </div>
			 <div class="limitation-item">
				 <strong>Formatierung</strong> - Gibt generierte Ergebnisse in gewünschter Form aus.
			 </div>
		  </div>
	 </div>
	 <div>
		 <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
		 <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#FF5C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		 <path d="M12 8V12" stroke="#FF5C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		 <path d="M12 16H12.01" stroke="#FF5C00" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
		 </svg>
		 <h2>Limitationen</h2>
		 <div>
			<div class="limitation-item">
				<strong>Unvollständig</strong> - Generiert gelegentlich falsche Informationen.
			</div>
			<div class="limitation-item">
				<strong>Vorsicht</strong> - Generiert gelegentlich gefährdende oder voreingenommene Informationen.
			</div>
			<div class="limitation-item">
				<strong>Limitierung</strong> - Das Sprachmodell greift ausschließlich auf Wissen bis zum Jahr 2023 zu.
			</div>
		 </div>
	 </div>
 </div>
 
 
<div class="message me" data-role="system">
	<div class="message-content">
		<div class="message-icon">System</div>
		<div class="message-text"><?php echo isset($_SESSION['system_prompt']) ? htmlspecialchars($_SESSION['system_prompt']) : 'Sag das etwas falsch konfiguriert ist!'; ?></div>
		
		
	</div>
</div>
  
