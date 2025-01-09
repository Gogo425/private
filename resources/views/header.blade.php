<header>
    <menu>
        <div class="flex items-center justify-between p-4 bg-gray-100">
            <img src="./img/logo.png" alt="logo" class="w-16 h-16">
            <div class="flex space-x-4">


            

              
               

                <?php
                    $id = Auth::id();
                    
                    $technicalDirectors = DB::select('select count(*) as count from technical_directors where id_per = :id', ['id' => $id])[0];
                    $trainingManager = DB::select('select count(*) as count from training_managers where id_per = :id', ['id' => $id])[0];
                    $initiator =DB::select('select count(*) as count from initiators where id_per = :id', ['id' => $id])[0];
                    $student =DB::select('select count(*) as count from students where id_per = :id', ['id' => $id])[0];
                  
                    if($technicalDirectors->count == 1){
                        /* aptitudes et compétences / formation et peut les modif si jamais le manuel technique évolue 
                                - listes des utilisateurs ds la base -> ajout et modif info
                                - créer formation, attribuer un responsable de formation ds eleves et initiateurs
                                - voir ensemble formations existantes
                                - bilan /eleves
                        */
                        echo "
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste des utilisateurs </button>
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste des formations </button>
                            <button class='px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600'> Bilan des èlèves </button>";
                       
                    }
                    if($trainingManager->count == 1){
                        
                        /*
                        - voir ensemble élèves et initiateurs de la formation
                        - créer des séances,voir les séances déjà faites
                        - voir bilan de sa formation /eleves pour toutes les compétences
                        */

                        echo "
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste des utilisateurs </button>
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste des séances </button>
                            <button class='px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600'> Bilan des èlèves </button>";

                        

                       
                       
                    }

                    if($initiator->count == 1){
                        /*  - voir ses séances, séances passées, 
                            -qui il a
                            - quelle aptitude il travaille
                            - evaluer eleves
                        */
                        echo "<button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste de mes séances </button>
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste de mes aptitudes </button>
                            <button class='px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600'> Evaluer des èlèves </button>";
                       
                    }

                    if($student->count == 1){
                        /*
                          - bilan formation
                            - seance passée et avenir
                        */
                        echo "<button class='px-4 py-2 bg-orange-500 text-white rounded hover:bg-orange-600'> Mon bilan de la formation </button>
                            <button class='px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600'> Liste de mes séances </button>";
                    }
                ?>

                <a href="/profile"><button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Profil</button></a>
                <a href="/logout"><button class="px-4 py-2 bg-red-500 text-white rounded hover:bg-red-600">Déconnexion</button></a>

            </div>
        </div>    
    </menu>

</header>