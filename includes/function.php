<?php

//sanitizes user input 
function clean(string $value): string
{
    return htmlspecialchars(trim($value), ENT_QUOTES, 'UTF-8');
    
}
//Shortcut for safely print html
function e(?string $value): string
{
    return htmlspecialchars((string)($value ?? ''), ENT_QUOTES, 'UTF-8');
}

//redirect helpers
function redirect(string $path): void
{
    header("Location: " . $path);
    exit;
}


<?php

// Get user information by ID
function getUserById(PDO $pdo, int $userId): ?array
{
    $sql = "SELECT * FROM users WHERE id = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    return $user ?: null;
}


// Check whether voter is valid and active
function verifyVoter(PDO $pdo, int $userId): bool
{
    $sql = "SELECT id FROM users 
            WHERE id = ? AND role = 'voter' AND status = 'active'";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    return $stmt->fetch() !== false;
}


// Check whether voter has already voted
function hasVoted(PDO $pdo, int $userId): bool
{
    $sql = "SELECT id FROM votes WHERE voter_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$userId]);

    return $stmt->fetch() !== false;
}


// Get voter profile
function getVoterProfile(PDO $pdo, int $userId): ?array
{
    return getUserById($pdo, $userId);
}


<?php

// Check whether a vote is valid
function validateVote(
    PDO $pdo,
    int $voterId,
    int $candidateId
): bool {
    
    // Check voter
    if (!verifyVoter($pdo, $voterId)) {
        return false;
    }

    // Check candidate
    $candidate = getCandidateById($pdo, $candidateId);

    if (!$candidate) {
        return false;
    }

    // Check if voter already voted
    if (hasVoted($pdo, $voterId)) {
        return false;
    }

    return true;
}


// Cast a vote
function castVote(
    PDO $pdo,
    int $voterId,
    int $candidateId
): bool {

    if (!validateVote($pdo, $voterId, $candidateId)) {
        return false;
    }

    $sql = "INSERT INTO votes (voter_id, candidate_id)
            VALUES (?, ?)";

    $stmt = $pdo->prepare($sql);

    return $stmt->execute([
        $voterId,
        $candidateId
    ]);
}


// Get vote made by a voter
function getVoteByVoter(PDO $pdo, int $voterId): ?array
{
    $sql = "SELECT * FROM votes WHERE voter_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$voterId]);

    $vote = $stmt->fetch(PDO::FETCH_ASSOC);

    return $vote ?: null;
}

<?php

// Get vote count of one candidate
function getVoteCount(PDO $pdo, int $candidateId): int
{
    $sql = "SELECT COUNT(*) 
            FROM votes 
            WHERE candidate_id = ?";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([$candidateId]);

    return (int) $stmt->fetchColumn();
}


// Get all election results
function getAllResults(PDO $pdo): array
{
    $sql = "SELECT 
                c.id,
                c.name,
                c.party,
                COUNT(v.id) AS total_votes
            FROM candidates c
            LEFT JOIN votes v
                ON c.id = v.candidate_id
            GROUP BY c.id, c.name, c.party
            ORDER BY total_votes DESC";

    $stmt = $pdo->query($sql);

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Get total number of votes
function getTotalVotes(PDO $pdo): int
{
    $sql = "SELECT COUNT(*) FROM votes";

    return (int) $pdo->query($sql)->fetchColumn();
}


// Get candidate with highest votes
function getWinner(PDO $pdo): ?array
{
    $results = getAllResults($pdo);

    if (empty($results)) {
        return null;
    }

    return $results[0];
}



<?php

// Get election status
function getElectionStatus(PDO $pdo): string
{
    $sql = "SELECT status FROM election
            ORDER BY id DESC
            LIMIT 1";

    $stmt = $pdo->query($sql);

    $status = $stmt->fetchColumn();

    return $status ?: 'not_started';
}


// Start election
function startElection(PDO $pdo): bool
{
    $sql = "UPDATE election
            SET status = 'active'
            WHERE id = 1";

    return $pdo->exec($sql) > 0;
}


// End election
function endElection(PDO $pdo): bool
{
    $sql = "UPDATE election
            SET status = 'ended'
            WHERE id = 1";

    return $pdo->exec($sql) > 0;
}

<?php

// Sanitize user input
function clean(string $value): string
{
    return htmlspecialchars(
        trim($value),
        ENT_QUOTES,
        'UTF-8'
    );
}


// Shortcut for safely printing HTML
function e(?string $value): string
{
    return htmlspecialchars(
        (string)($value ?? ''),
        ENT_QUOTES,
        'UTF-8'
    );
}


// Redirect helper
function redirect(string $path): void
{
    header("Location: $path");
    exit;
}

