<?php

namespace web\work\assessment\Model;

class DashboardResponse
{
    private ?string $userId;
    private ?string $name;
    private ?string $clockin;
    private ?int $persentationPackage;
    private ?int $totalPackage;
    private ?string $commission;
    private ?bool $attendance;
	private ?Array $diagramAttendance;
	private ?Array $diagramPackage;

	/**
	 * @return ?string
	 */
	function getUserId(): ?string {
		return $this->userId;
	}
	
	/**
	 * @param ?string $userId 
	 * @return DashboardResponse
	 */
	function setUserId(?string $userId): self {
		$this->userId = $userId;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getName(): ?string {
		return $this->name;
	}
	
	/**
	 * @param ?string $name 
	 * @return DashboardResponse
	 */
	function setName(?string $name): self {
		$this->name = $name;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getClockin(): ?string {
		return $this->clockin;
	}
	
	/**
	 * @param ?string $clockin 
	 * @return DashboardResponse
	 */
	function setClockin(?string $clockin): self {
		$this->clockin = $clockin;
		return $this;
	}
	/**
	 * @return ?int
	 */
	function getPersentationPackage(): ?int {
		return $this->persentationPackage;
	}
	
	/**
	 * @param ?int $persentationPackage 
	 * @return DashboardResponse
	 */
	function setPersentationPackage(?int $persentationPackage): self {
		$this->persentationPackage = $persentationPackage;
		return $this;
	}
	/**
	 * @return ?int
	 */
	function getTotalPackage(): ?int {
		return $this->totalPackage;
	}
	
	/**
	 * @param ?int $totalPackage 
	 * @return DashboardResponse
	 */
	function setTotalPackage(?int $totalPackage): self {
		$this->totalPackage = $totalPackage;
		return $this;
	}
	/**
	 * @return ?bool
	 */
	function getAttendance(): ?bool {
		return $this->attendance;
	}
	
	/**
	 * @param ?bool $attendance 
	 * @return DashboardResponse
	 */
	function setAttendance(?bool $attendance): self {
		$this->attendance = $attendance;
		return $this;
	}
	/**
	 * @return ?string
	 */
	function getCommission(): ?string {
		return $this->commission;
	}
	
	/**
	 * @param ?string $commission 
	 * @return DashboardResponse
	 */
	function setCommission(?string $commission): self {
		$this->commission = $commission;
		return $this;
	}

	/**
	 * Get the value of diagramAttendance
	 */ 
	public function getDiagramAttendance()
	{
		return $this->diagramAttendance;
	}

	/**
	 * Set the value of diagramAttendance
	 *
	 * @return  self
	 */ 
	public function setDiagramAttendance($diagramAttendance)
	{
		$this->diagramAttendance = $diagramAttendance;

		return $this;
	}

	/**
	 * Get the value of diagramPackage
	 */ 
	public function getDiagramPackage()
	{
		return $this->diagramPackage;
	}

	/**
	 * Set the value of diagramPackage
	 *
	 * @return  self
	 */ 
	public function setDiagramPackage($diagramPackage)
	{
		$this->diagramPackage = $diagramPackage;

		return $this;
	}
}   