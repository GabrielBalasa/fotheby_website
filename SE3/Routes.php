<?php
    namespace SE3;
    interface Routes
    {
        public function getRoutes(): array;
        public function authentication(): \SE3\Authentication;
        public function checkRole($role): bool;
        public function getLayoutVariables();
    }