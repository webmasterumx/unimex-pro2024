$(document).ready(function () {


	$('#tab1 input').on('change', function () {
		var res1 = ($('input[name=rp1]:checked', '#tab1').val());

		$('#tab2 input').on('change', function () {
			var res2 = ($('input[name=rp2]:checked', '#tab2').val());


			$('#tab3 input').on('change', function () {
				var res3 = ($('input[name=rp3]:checked', '#tab3').val());


				$('#tab4 input').on('change', function () {
					var res4 = ($('input[name=rp4]:checked', '#tab4').val());


					$('#tab5 input').on('change', function () {
						var res5 = ($('input[name=rp5]:checked', '#tab5').val());


						$('#tab6 input').on('change', function () {
							var res6 = ($('input[name=rp6]:checked', '#tab6').val());

							$('#tab7 input').on('change', function () {
								var res7 = ($('input[name=rp7]:checked', '#tab7').val());


								$('#tab8 input').on('change', function () {
									var res8 = ($('input[name=rp8]:checked', '#tab8').val());

									$('#tab9 input').on('change', function () {
										var res9 = ($('input[name=rp9]:checked', '#tab9').val());

										$('#tab10 input').on('change', function () {
											var res10 = ($('input[name=rp10]:checked', '#tab10').val());

											$('#tab11 input').on('change', function () {
												var res11 = ($('input[name=rp11]:checked', '#tab11').val());

												$('#tab12 input').on('change', function () {
													var res12 = ($('input[name=rp12]:checked', '#tab12').val());

													$('#tab13 input').on('change', function () {
														var res13 = ($('input[name=rp13]:checked', '#tab13').val());


														var vegetales = [res1, res2, res3, res4, res5, res6, res7, res8, res9, res10, res11, res12, res13];

														var Searcha = "a"
														var ia = 0;
														var countera = 0;
														while (ia != -1) {
															var ia = vegetales.indexOf(Searcha, ia);
															if (ia != -1) {
																ia++;
																countera++;
															}
														}
														console.log(countera);

														var Searchb = "b"
														var ib = 0;
														var counterb = 0;
														while (ib != -1) {
															var ib = vegetales.indexOf(Searchb, ib);
															if (ib != -1) {
																ib++;
																counterb++;
															}
														}
														console.log(counterb);

														if (countera > counterb) {
															location.href = "hemisferio-a.php";
														} else {
															location.href = "hemisferio-b.php";

														}





													});
												});
											});
										});
									});
								});
							});
						});
					});
				});
			});
		});
	});



	$('#rootwizard').bootstrapWizard({
		onNext: function (tab, navigation, index) {
			if (index == 1) {
				// Make sure we entered the name
				if (!$('#tab1').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta1: Seleciona una respuesta');
					return false;
				}

			}



			if (index == 2) {
				// Make sure we entered the name
				if (!$('#tab2').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta2: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 3) {
				// Make sure we entered the name
				if (!$('#tab3').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta3: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 4) {
				// Make sure we entered the name
				if (!$('#tab4').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta 4: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 5) {
				// Make sure we entered the name
				if (!$('#tab5').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta5: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 6) {
				// Make sure we entered the name
				if (!$('#tab6').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta6: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 7) {
				// Make sure we entered the name
				if (!$('#tab7').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta7: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 8) {
				// Make sure we entered the name
				if (!$('#tab8').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta8: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 9) {
				// Make sure we entered the name
				if (!$('#tab9').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta9: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 10) {
				// Make sure we entered the name
				if (!$('#tab10').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta10: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 11) {
				// Make sure we entered the name
				if (!$('#tab11').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta11: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 12) {
				// Make sure we entered the name
				if (!$('#tab12').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta12: Seleciona una respuesta');
					return false;
				}
			}
			if (index == 13) {
				// Make sure we entered the name
				if (!$('#tab13').find("input[type='checkbox'],input[type='radio']").is(":checked")) {
					alertify.alert('Pregunta13: Seleciona una respuesta');
					return false;
				}
			}


		},

		onTabShow: function (tab, navigation, index) {
			var $total = navigation.find('li').length;
			var $current = index + 1;
			var $percent = ($current / $total) * 100;
			$('#rootwizard .progress-bar').css({ width: $percent + '%' });
		}
	});



});