<?php
include("connection.php");

class DishRecommender {
    private $db;
    
    public function __construct($db) {
        $this->db = $db;
    }
    
    public function getRecommendations($user_id) {
        // Get user preferences
        $prefs = $this->getUserPreferences($user_id);
        
        // Base query with weighted scoring
        $query = "SELECT d.*, 
                  (CASE WHEN d.cuisine_type = ? THEN 2 ELSE 0 END +
                   CASE WHEN d.spice_level = ? THEN 1 ELSE 0 END +
                   d.popularity_score) as score
                  FROM dishes d
                  WHERE d.d_id NOT IN (
                    SELECT dish_id 
                    FROM order_history 
                    WHERE user_id = ? 
                    AND order_date > DATE_SUB(NOW(), INTERVAL 7 DAY)
                  )";
        
        if (!empty($prefs['dietary_restrictions'])) {
            $query .= " AND d.dietary_tags LIKE ?";
        }
        
        $query .= " ORDER BY score DESC LIMIT 6";
        
        // Prepare and execute
        $stmt = $this->db->prepare($query);
        
        if (!empty($prefs['dietary_restrictions'])) {
            $dietary = "%{$prefs['dietary_restrictions']}%";
            $stmt->bind_param("ssss", 
                $prefs['cuisine_type'],
                $prefs['spice_level'],
                $user_id,
                $dietary
            );
        } else {
            $stmt->bind_param("sss", 
                $prefs['cuisine_type'],
                $prefs['spice_level'],
                $user_id
            );
        }
        
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    
    private function getUserPreferences($user_id) {
        $query = "SELECT * FROM user_preferences WHERE user_id = ? ORDER BY created_at DESC LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}
?>